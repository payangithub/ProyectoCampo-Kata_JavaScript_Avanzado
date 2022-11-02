const express = require("express");
const router = express.Router();
const Cat_variedades=require("../database/models/Variedades");
const sequelize =require("../database/db");

router.get("/",(req,res)=>{
    Cat_variedades.findAll().then(variedades => {
        
        //console.log(productos[0].id);
        res.json({
          datos:variedades
        });
      });
});

module.exports = router;