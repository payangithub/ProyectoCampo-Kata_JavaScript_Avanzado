const express = require('express');
const nodemon = require('nodemon');
const app = express();
const sequelize = require("./database/db");
const PORT = process.env.PORT || 3000;

app.use(express.json());
app.use(express.urlencoded({extended:false}));

app.get('/',(req,res)=>{
    res.json({
        version:"221005",
        name:"campo"
    });
});

app.use("/api/productos",require("./routes/productos"));
app.use("/api/variedades",require("./routes/variedades"));
app.listen(PORT,()=>{
    sequelize.authenticate().then(()=>{
        console.log("Nos Conectamos a la base de datos");
    }).catch(error=>{
        console.log("Error en conexion",error);
    });
});