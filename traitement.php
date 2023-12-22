<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>bouda</h1>
    <script>
        

    async function getmarque(url){

        try{
            let mydata = await fetch(url);
            return await mydata.json();
        }catch(err){
            return err;
        }
            


    }
    getmarque(`phpFile/product/getProduct.php`).then((data)=>{
        data.foreach((e)=>{
            console.log(e);
        })
    }).catch((err)=>{
        console.log(err);
    })
    

    </script>
</body>
</html>