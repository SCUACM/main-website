import express from "express";
import path from "path";
import morgan from "morgan";
import bodyParser from "body-parser";
import cookieParser from "cookie-parser";
import expressLayouts from "express-ejs-layouts";
import session from "express-session";
import redis from "redis";
import redisStore from "connect-redis";
import fs from "fs";
import * as routes from "./controller";
import * as models from "./model";

class App {
    public server: express.Express;
    public redis: redis.RedisClient;
    public routes: routes.Routes;

    constructor() {
        this.server = express();
        this.redis = redis.createClient();
        this.setupViews();
        this.setupMiddleWare();
        this.setupRedis();
        this.routes = new routes.Routes(this.server);
        models.seqInst.sync({ force: false });
    }

    private setupViews(): void {
        this.server.set('views', path.join(__dirname, '..', 'views'));
        this.server.set('view engine', 'ejs');
    }

    private setupMiddleWare(): void {
        // this.server.use(favicon(path.join(__dirname, 'public', 'favicon.ico')));
        this.server.use(morgan('dev'));
        this.server.use(bodyParser.json());
        this.server.use(bodyParser.urlencoded({ extended: true }));
        this.server.use(cookieParser());
        this.server.use(express.static(path.join(__dirname, '..', 'public')));
        // this.server.use(expressLayouts);
    }

    private setupRedis(): void {
        let store = redisStore(session);
        this.server.use(
            session({
                store: new store({
                    host: "localhost",
                    port: 6379,
                    client: this.redis
                }),
                secret: "AAAAAAAAAAAAAAAAAAAAa"
            })
        );
    }
}

export default new App().server;