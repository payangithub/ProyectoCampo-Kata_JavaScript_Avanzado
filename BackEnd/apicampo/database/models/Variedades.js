const {Model,DataTypes}= require("sequelize");
const sequelize = require("../db");

class Cat_variedades extends Model{}
Cat_variedades.init(
    {
        id:{ type: DataTypes.INTEGER,primaryKey:true},
        id_producto:{ type: DataTypes.INTEGER},
        nombre:{ type: DataTypes.STRING}
    },
    {
        sequelize,
        modelName:"Cat_variedades",
        timestamps:false
    }
);

module.exports = Cat_variedades;