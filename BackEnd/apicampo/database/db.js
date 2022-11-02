const{Sequelize}=require("sequelize");
const {database}=require("../config");

const sequelize = new Sequelize(
    database.database,
    database.username,
    database.password,
    {host:database.host,
     dialect:"mysql",
     port:database.port
    }
);


module.exports =sequelize;