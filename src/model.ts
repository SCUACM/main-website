import mysql from "mysql";
import sequelize, { Sequelize } from "sequelize";
import fs from "fs";

// CREATE DATABASE acmsite
// GRANT ALL PRIVILEGES ON acmsite.* TO 'acm'@'localhost' IDENTIFIED BY 'acm-password123!';

const seqInst = new sequelize(
    "acmsite",
    "acm",
    "acm-password123!",
    {
        dialect: "mysql",
        logging: console.log,
        host: "localhost"
    }
);

const boardMember = seqInst.define('board_member', {
    name: {
        type: sequelize.STRING
    },
    position: {
        type: sequelize.STRING
    },
    icon: {
      type: sequelize.STRING
    },
    group: {
        type: sequelize.STRING
    },
    email: {
        type: sequelize.STRING
    },
    bio: {
        type: sequelize.TEXT
    }
});

const event = seqInst.define('event', {
    type: {
        type: sequelize.STRING
    },
    dates: {
        type: sequelize.STRING
    },
    icon: {
      type: sequelize.STRING
    },
    info: {
        type: sequelize.TEXT
    }
});

export { seqInst, boardMember, event };