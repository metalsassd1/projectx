const express = require("express");
const app = express();
const mysql = require("mysql2/promise");
const cors = require('cors');

app.use(cors())

app.get("/getpromotion", async (req, res) => {
    const connection = await mysql.createConnection({
      host: 'localhost',
      user: 'metha', // <== ระบุให้ถูกต้อง
      password: '12345678', // <== ระบุให้ถูกต้อง
      database: 'product_project', // <== ระบุ database ให้ถูกต้อง
      port: 3306, // <== ใส่ port ให้ถูกต้อง (default 3306)
    });
    const query = ("select * from promotion")
    const sql = await connection.query(query)
  
    res.status(200).json(sql)
  });

  app.listen(8000, () => {
    console.log("Server is running at port 8000");
  });