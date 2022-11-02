const {Model,DataTypes}= require("sequelize");
const sequelize = require("../db");

class Cat_productos extends Model{}
Cat_productos.init(
    {
        id:{ type: DataTypes.INTEGER,primaryKey:true},
        nombre:{ type: DataTypes.STRING},
        imgicon:{ type: DataTypes.STRING},
        imgbackgraound:{ type: DataTypes.STRING},
        caracteristicas:{ type: DataTypes.STRING},
        tipo:{ type: DataTypes.STRING}
    },
    {
        sequelize,
        modelName:"Cat_productos",
        timestamps:false
    }
);

module.exports = Cat_productos;