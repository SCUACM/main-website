import express from "express";
import * as models from "./model";
import { Models, Model } from "sequelize";

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
                res.render('board/index', { members: all });
            });
        }
    },

    new: {
        get: (req: express.Request, res:express.Response): void => {
            res.render('board/new');
        },
        post: (req: express.Request, res:express.Response): void => {
            models.boardMember.create(req.body).then(() => {
                res.redirect('/board');
            });
        }
    },

    edit: {
        get: (req: express.Request, res:express.Response): void => {
            models.boardMember.findById(req.params["id"]).then((m: any) => {
                res.render('board/edit', { record: m });
            });
        },
        post: (req: express.Request, res:express.Response): void => {
            models.boardMember.findById(req.params["id"]).then((m: any) => {
                m.updateAttributes(req.body).then(()=> {
                    res.redirect("/board");
                });
            });
        }
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
            models.event.findAll().then((all: any) => {
                res.render('events/index', { events: all });
            });
        }
    },

    new: {
        get: (req: express.Request, res:express.Response): void => {
            res.render('events/new');
        },
        post: (req: express.Request, res:express.Response): void => {
            models.event.create(req.body).then(() => {
                res.redirect('/events');
            });
        }
    },

    edit: {
        get: (req: express.Request, res:express.Response): void => {
            res.render('events/edit');
        },
        post: (req: express.Request, res:express.Response): void => {

        }
    },

    del: {
        get: (req: express.Request, res:express.Response): void => {
            models.event.destroy({ where: { id: req.params["id"] } }).then((m: any) => {
                res.redirect("/board");
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

class Routes {

    constructor(server: express.Express) {
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

        server.use('/', router);
    }
}

export { Routes };