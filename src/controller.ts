import express from "express";
import multer from "multer";
import * as models from "./model";
import { Models, Model } from "sequelize";
import path from "path";

const file_upload = multer({ dest: 'uploads/' });

const session_fetch = (req: express.Request, res:express.Response, next: Function) => {
    res.locals.session = req.session;
    next();
} 

const index = {
    index: {
        get: (req: express.Request, res:express.Response): void => {
            res.render('index');
        }
    }
};

const about = {
    index: {
        get: (req: express.Request, res:express.Response): void => {
            res.render('about/index');
        }
    }
};

const board = {
    index: {
        get: (req: express.Request, res:express.Response): void => {
            models.boardMember.findAll().then((all: any) => {
                let acm: any[] = [], acmw: any[] = [], advise: any[] = [];
                let ittr: Function = (index: number, completed: Function) => {
                    if(index >= all.length) {
                        completed();
                    }else{
                        if(all[index].group == "ACM") {
                            acm.push(all[index]);
                        } else if(all[index].group == "ACM-W") {
                            acmw.push(all[index]);
                        } else if(all[index].group == "Sponsor") {
                            advise.push(all[index]);
                        }
                        ittr(index + 1, completed);
                    }
                }
                ittr(0, () => {
                    res.render('board/index', { acm: acm, acmw: acmw, advise: advise });
                });
            });
        }
    },

    new: {
        get: (req: express.Request, res:express.Response): void => {
            res.render('board/new');
        },
        post: [file_upload.single('icon'), (req: express.Request & { file: any }, res:express.Response): void => {
            models.boardMember.create({
                name: req.body.name,
                position: req.body.position,
                icon: "/" + req.file.path,
                group: req.body.group, 
                email: req.body.email,
                bio: req.body.bio
            }).then(() => {
                res.redirect('/board');
            });
        }]
    },

    edit: {
        get: (req: express.Request, res:express.Response): void => {
            models.boardMember.findById(req.params.id).then((m: any) => {
                res.render('board/edit', { record: m });
            });
        },
        post: [file_upload.single('icon'), (req: express.Request & { file: any }, res:express.Response): void => {
            models.boardMember.findById(req.params.id).then((m: any) => {
                console.log(req.file);
                m.updateAttributes({
                    name: req.body.name,
                    position: req.body.position,
                    icon: (req.file ? "/" + req.file.path : m.icon),
                    group: req.body.group, 
                    email: req.body.email,
                    bio: req.body.bio
                }).then(()=> {
                    res.redirect("/board");
                });
            });
        }]
    },

    del: {
        get: (req: express.Request, res:express.Response): void => {
            models.boardMember.destroy({ where: { id: req.params["id"] } }).then((m: any) => {
                res.redirect("/board");
            });
        }
    }
};

const events = {
    index: {
        get: (req: express.Request, res:express.Response): void => {
            models.event_group.findAll({ include: [models.event] }).then((groups: any) => {
                res.render('events/index', { groups: groups });
            });
        }
    },

    new: {
        get: (req: express.Request, res:express.Response): void => {
            res.render('events/new');
        },
        post: [file_upload.single('icon'), (req: express.Request & { file: any }, res:express.Response): void => {
            models.event_group.findOrCreate({ 
                where: { name: req.body.group }, 
                defaults: { name: req.body.group } 
            }).spread((grp: any, created) => {
                models.event.create({
                    dates: req.body.dates,
                    icon: "/" + req.file.path,
                    info: req.body.info
                }).then((ne)=>{
                    grp.addEvent(ne).then(()=>{
                        res.redirect('/events');
                    });
                });
            });
        }]
    },

    edit: {
        get: (req: express.Request, res:express.Response): void => {
            models.event.findById(req.params.id, { include: [models.event_group] }).then((e: any) => {
                console.log(e);
                res.render('events/edit', { e: e });
            });
        },
        post: [file_upload.single('icon'), (req: express.Request & { file: any }, res:express.Response): void => {
            models.event.findById(req.params["id"]).then((m: any) => {
                m.updateAttributes({
                    dates: req.body.dates,
                    icon: (req.file ? "/" + req.file.path : m.icon),
                    info: req.body.info
                }).then(()=> {
                    res.redirect("/events");
                });
            });
        }]
    },

    del: {
        get: (req: express.Request, res:express.Response): void => {
            models.event.findById(req.params.id, { 
                include: [ 
                    { 
                        model: models.event_group, 
                        include: [ models.event ] 
                    } 
                ] 
            }).then((m: any) =>{
                let del_group: any = undefined;
                console.log(m);
                if(m.event_group.events.length === 1) {
                    del_group = m.event_group;
                }
                m.destroy().then(() => {
                    if(del_group) {
                        del_group.destroy().then(() => {
                            res.redirect("/events");
                        });
                    } else {
                        res.redirect("/events");
                    }
                });
            });
        }
    }
};

const resources = {
    index: {
        get: (req: express.Request, res:express.Response): void => {
            res.render('resources/index');
        }
    }
};

const join = {
    index: {
        get: (req: express.Request, res:express.Response): void => {
            res.render('join/index');
        }
    }
};

const login = {
    index: {
        get: (req: express.Request, res:express.Response): void => {
            if(req.session.admin === true) {
                req.session.admin = false;
                res.redirect('/');
            } else {
                res.render('login/index');
            }
        },
        post: (req: express.Request, res:express.Response): void => {
            if(req.body.username === "USER" && req.body.password === "PASS") {
                req.session.admin = true;
                res.redirect('/');
            } else {
                res.redirect('/login');
            }
        }
    }
};

const uploads = {
    get: (req: express.Request, res:express.Response): void => {
        console.log(req.params);
        res.sendFile(path.join(__dirname, '..', 'uploads', req.params.id));
    } 
}

class Routes {

    constructor(server: express.Express) {

        server.use(session_fetch);

        const router = express.Router();
        router.get('/', index.index.get);

        router.get('/about', about.index.get);

        router.get('/board', board.index.get);

        router.get('/board/:id/edit', board.edit.get);
        router.post('/board/:id/edit', board.edit.post);

        router.get('/board/:id/delete', board.del.get);
        
        router.get('/board/new', board.new.get);
        router.post('/board/new', board.new.post);


        router.get('/events', events.index.get);
        
        router.get('/events/new', events.new.get);
        router.post('/events/new', events.new.post);

        router.get('/events/:id/edit', events.edit.get);
        router.post('/events/:id/edit', events.edit.post);

        router.get('/events/:id/delete', events.del.get);

        router.get('/resources', resources.index.get);
        
        router.get('/join', join.index.get);

        router.get('/login', login.index.get);
        router.post('/login', login.index.post);

        router.get('/uploads/:id', uploads.get);

        server.use('/', router);
    }
}

export { Routes };