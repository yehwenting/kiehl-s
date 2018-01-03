 $(document).ready(()=>{

//display data from db
 $.ajax({
    method: "POST", url: "test1.php", 

  }).done(function( data ) {

   var result = $.parseJSON(data);
   console.log(result);

   var string = "";
   var i =0;
   //from result create a string of data and append to the div
   $.each( result, function( key, value ) {
      let stockBtn;
    if(value['date']!="0"){
      stockBtn='<button type="button" class="btn btn-outline-danger" id="'+i+'">補貨中! !</button>';
    }else{
      stockBtn='<button type="button" class="btn btn-outline-success" id="'+i+'">庫存充足</button>';
    }
    
     string += '<tr ><th scope="row">'+value['id'] + 
                "</th><td> " + value['name']+
                '</td><td id=remain'+i+'>'+ value['remain']+"</td><td>"+
                stockBtn
                +"</td><td id='EOQ"+i+"'>"+value['EOQ']+"</td><td id='ROP"+i+"'>"+value['ROP']+"</td></tr>";

      $("tbody").html(string);
      i+=1;
    });

    $(".btn").click(function(){
    console.log(this.id);
    let content=$(this).text();
    if(content=="庫存充足"){
      alert("庫存充足，不需增貨");
    }else if(content=="補貨中! !"){
      var answer = confirm("貨已送到店 ?");
        if (answer) {
          let remain= parseInt(result[this.id].remain);
          let EOQ = parseInt(result[this.id].EOQ);
          let newRemain=remain+EOQ;
          console.log(EOQ+remain);
          let newRemainSql= "update inventory set remain='"+newRemain+"' where id='"+(parseInt(this.id)+1)+"';";
          let newDateSql= "update inventory set date='0' where id='"+(parseInt(this.id)+1)+"';";
          console.log(newRemainSql);
          $(this).removeClass();
          $(this).addClass("btn btn-outline-success");
          $(this).text("庫存充足");
          let r="#remain"+this.id;
          $(r).text(newRemain);
          $.ajax({
            method: "POST", url: "updateEoqRopData.php", 
            data: {sqlEOQ: newRemainSql, sqlROP: newDateSql},

          }).done(function( data ) {
            let dd=new Date();
            alert("於"+dd+"\n補貨完成!!");
      
                });
        }
    }
  });
  // }

  });

  $(".updateEP").click(function(){
    $.ajax({
    method: "POST", url: "test1.php", 
  }).done(function( data ) {

   var result = $.parseJSON(data);
   console.log(result);
   var k=0;
   $.each( result, function( key, value ) {
    // updateEOQROP();
    let price=parseInt(value['price']);
    let yearly_demand=parseInt(value['yearly_demand']);
    let daily_demand=parseInt(value['daily_demand']);
    let stock=parseInt(value['stock']);
    let lead_time=parseInt(value['lead_time']);
    let STD=parseInt(value['STD'])
    let EOQ = parseInt(Math.sqrt((2*yearly_demand*2000)/(price*0.25))); 
    let ROP = Math.ceil(daily_demand*lead_time+1.65*STD*Math.sqrt(lead_time));
    console.log(EOQ);
      console.log(price);

    // let dataString="EOQ="+EOQ;
    let sqlEOQ="update inventory set EOQ='"+EOQ+"' where id='"+value['id']+"';";
    let sqlROP="update inventory set ROP='"+ROP+"' where id='"+value['id']+"';";
        //update EOQ ROP
    $.ajax({
      method: "POST", url: "updateEoqRopData.php", 
      data: {sqlEOQ: sqlEOQ, sqlROP: sqlROP},

    }).done(function( data ) {
      // console.log(EOQ);
      // console.log(ROP);
          });
    let id1="#EOQ"+k;
    let id2="#ROP"+k; 
    $(id1).text(EOQ);
    $(id2).text(ROP);
    k+=1
    });

  });
  alert("EOQ / ROP 已更新");

  });

  

  
  

});