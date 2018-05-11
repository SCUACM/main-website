
import express from "express";

class Routes { 
    constructor(server: express.Express) {
        const router = express.Router();
        router.get('/', this.index);
        router.get('/about', this.about);
        router.get('/board', this.board);
        router.get('/events', this.events);
        router.get('/resources', this.resources);
        router.get('/join', this.join);
        server.use('/', router);
    }

    private index(req: express.Request, res:express.Response): void {
        res.render('index');
    }

    private about(req: express.Request, res:express.Response): void {
        res.render('about');
    }

    private board(req: express.Request, res:express.Response): void {
        res.render('board');
    }

    private events(req: express.Request, res:express.Response): void {
        res.render('events');
    }

    private resources(req: express.Request, res:express.Response): void {
        res.render('resources');
    }

    private join(req: express.Request, res:express.Response): void {
        res.render('join');
    }
}

export { Routes };