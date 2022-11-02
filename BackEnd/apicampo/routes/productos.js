const express = require("express");
const router = express.Router();
const Cat_productos=require("../database/models/Productos");
const sequelize =require("../database/db");

router.get("/",(req,res)=>{
    Cat_productos.findAll().then(productos => {
        
        //console.log(productos[0].id);
        res.json({
          datos:productos
        });
      });
});
router.get("/all",(req,res)=>{
  sequelize.query("call campo.proc_getproductall()").then(response =>{
    res.json({ 
      datos : response
    }); 
  });
});
router.get("/byid/:id",(req,res)=>{
  
  sequelize.query("call campo.proc_getproductid(:id)",{replacements:{id:req.params.id}}).then(response =>{
    res.json({ 
      datos : response
    }); 
  });
});
module.exports = router;