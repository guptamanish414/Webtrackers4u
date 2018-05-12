<div class="search_block">
    <div class="search_box">
    <h2>Propety Search.</h2>


          <form>

            <div class="form-group">

                  <label class="label-text">Select Property Type</label>

                  <select id="ddlistPropertyType"name="ddlistPropertyTypee" onChange="setPriceRange(this.value);"  class="SlectBox">

                      <option  disabled="disabled" selected="selected"  value="" >Select Property Type</option>
                      <option value="Lettings">Letting</option>
                      <option value="Sales">Sales</option>

                  </select>

             </div>

              <div class="form-group">

                  <label class="label-text">Select City</label>

                  <select name="location" id="location" class="SlectBox">

                    <option disabled="disabled" selected="selected" value="">Select Location

                <? $locations=$os->get_propertylocation(" active=1",' title ','');

                      

                      foreach($locations as $loc){

                      ?>  

                      <option value="<? echo $loc['title'] ?>">&nbsp;<? echo $loc['title'] ?></option>  

                      <?  } ?>

                    </option>

                  </select>

             </div>






             <div class="row">

               <div class="col-md-6 col-xs-6" id="letFromPriceHolder" style="display:'';"  >

                <div class="form-group">

                    <label class="label-text">Minimum Price(pcm)</label>

                    <select name="fromPrice" id="fromPrice" class="SlectBox">

                        <option disabled="disabled" selected="selected"  value="">&nbsp;From</option>

                        <? for ($i=500; $i <= 2500; $i = $i+200) {  ?>

                          <option  value="500">&nbsp;<? echo $os->currency ?><? echo $i; ?> </option>
                         
                      <?  } ?>

                        

                    </select>

               </div>

             </div>

              <div class="col-md-6 col-xs-6"   id="letToPriceHolder" style="display:'';" >

                <div class="form-group">

                    <label class="label-text">Maximum Price(pcm)</label>

                    <select  name="toPrice" id="toPrice" class="SlectBox">

                        <option disabled="disabled" selected="selected"  value="">&nbsp;To</option>
                        

                        <? for ($i=500; $i <= 2500; $i = $i+200) {  ?>

                          <option  value="500">&nbsp;<? echo $os->currency ?><? echo $i; ?> </option>
                         
                      <?  } ?>


                    </select>

               </div>

             </div>



              <div class="col-md-6 col-xs-6" id="buyFromPriceHolder" style="display:none;" >

              <div class="form-group">

                 
                  <label class="label-text">Minimum Price</label>

                  <select name="fromPriceBuy" id="fromPriceBuy" class="SlectBox">

                          <option disabled="disabled" selected="selected" value="">&nbsp;From</option>
                         
                          <option value="100000"><? echo $os->currency ?>100,000</option>
                          <option value="150000"><? echo $os->currency ?>150,000</option>
                          <option value="200000"><? echo $os->currency ?>200,000</option>
                          <option value="250000"><? echo $os->currency ?>250,000</option>
                          <option value="300000"><? echo $os->currency ?>300,000</option>
                          <option value="350000"><? echo $os->currency ?>350,000</option>
                          <option value="400000"><? echo $os->currency ?>400,000</option>
                          <option value="450000"><? echo $os->currency ?>450,000</option>
                          <option value="500000"><? echo $os->currency ?>500,000</option>
                          <option value="750000"><? echo $os->currency ?>750,000</option>
                          <option value="1000000"><? echo $os->currency ?>1,000,000</option>
                          <option value="1500000"><? echo $os->currency ?>1,500,000</option>
                          <option value="2000000"><? echo $os->currency ?>2,000,000</option>
                          <option value="2500000"><? echo $os->currency ?>2,500,000</option>
                          <option value="3000000"><? echo $os->currency ?>3,000,000</option>
                          <option value="3500000"><? echo $os->currency ?>3,500,000</option>
                          <option value="4000000"><? echo $os->currency ?>4,000,000</option>
                          <option value="4500000"><? echo $os->currency ?>4,500,000</option>
                          <option value="5000000"><? echo $os->currency ?>5,000,000</option>

                          <option  value="0">&nbsp;No Limit</option>

                  </select>

               </div>

             </div>


             <div class="col-md-6 col-xs-6"  id="buyToPriceHolder" style="display:none;" >

              <div class="form-group">

                 
                  <label class="label-text">Maximam Price</label>

                  <select name="toPriceBuy" id="toPriceBuy" class="SlectBox">

                          <option disabled="disabled" selected="selected" value="">&nbsp;To</option>

                          <option value="100000"><? echo $os->currency ?>100,000</option>
                          <option value="150000"><? echo $os->currency ?>150,000</option>
                          <option value="200000"><? echo $os->currency ?>200,000</option>
                          <option value="250000"><? echo $os->currency ?>250,000</option>
                          <option value="300000"><? echo $os->currency ?>300,000</option>
                          <option value="350000"><? echo $os->currency ?>350,000</option>
                          <option value="400000"><? echo $os->currency ?>400,000</option>
                          <option value="450000"><? echo $os->currency ?>450,000</option>
                          <option value="500000"><? echo $os->currency ?>500,000</option>
                          <option value="750000"><? echo $os->currency ?>750,000</option>
                          <option value="1000000"><? echo $os->currency ?>1,000,000</option>
                          <option value="1500000"><? echo $os->currency ?>1,500,000</option>
                          <option value="2000000"><? echo $os->currency ?>2,000,000</option>
                          <option value="2500000"><? echo $os->currency ?>2,500,000</option>
                          <option value="3000000"><? echo $os->currency ?>3,000,000</option>
                          <option value="3500000"><? echo $os->currency ?>3,500,000</option>
                          <option value="4000000"><? echo $os->currency ?>4,000,000</option>
                          <option value="4500000"><? echo $os->currency ?>4,500,000</option>
                          <option value="5000000"><? echo $os->currency ?>5,000,000</option>
                

                          <option  value="0">&nbsp;No Limit</option>

                  </select>

               </div>

             </div>

             </div>


             <div class="form-group" id="salePurpose" >

                  <label class="label-text">Select Property Purpose</label>

                  <select name="propertyPurpose" id="propertyPurpose" class="SlectBox">

                      <option disabled="disabled" selected="selected" value="">Property Purpose</option>

                      <option value="Residential">Residential</option>

                      <option value="Commercial">Commercial</option>

                  </select>

             </div>


             <a href="javascript:void(0)" value="Search" onClick="searchProp()" class="button">Search</a>

             <div class="valuation_image"><img src="<?php echo $site['themePath']?>images/valuation.png"/></div>

          </form>




          <script type="text/javascript">
             $(document).ready(function () {
             window.asd = $('.SlectBox').SumoSelect();
               });
                   </script>

</div>
          



<script> 

       

function setPriceRange(k)
{
 //alert(k);
 
  if(k=='Sales')
  {
    
     
   //os.setHtml('priceUnit','');
   
 
  os.show('buyFromPriceHolder');
  os.show('buyToPriceHolder');
  os.hide('letFromPriceHolder');
  os.hide('letToPriceHolder');
  
   //os.show('salePurpose');
 
 
  }
  
  if(k=='Lettings')
  {
    //os.setHtml('priceUnit','(pcm)'); 
    os.show('letFromPriceHolder');
    os.show('letToPriceHolder');
 
    os.hide('buyFromPriceHolder');
    os.hide('buyToPriceHolder'); 
  }
 
}

function searchProp()
{

 

  var fromPrice=os.getVal('fromPrice').replace('From','');
  var toPrice=os.getVal('toPrice').replace('To','');
  var propertyPurpose=os.getVal('propertyPurpose');
  var propertyType = os.getVal('ddlistPropertyType');

    //alert(propertyType);
  
  if(propertyType == 'Lettings'){
    type='Lettings';
    fromPrice=os.getVal('fromPrice').replace('From','');
    toPrice=os.getVal('toPrice').replace('To','');
    //purposeTypeValue=os.getVal('purposeLett');
    
   }
  if(propertyType == 'Sales'){
    type='Sales';
    fromPrice=os.getVal('fromPriceBuy').replace('From','');
    toPrice=os.getVal('toPriceBuy').replace('','');
   // purposeTypeValue=os.getVal('purposeSale');
    
  }
  
  var locationV=os.getVal('location');
  //var bedV=os.getVal('bed');
 // var bedV='';

   //alert toPrice;
  
  
    
  var vars=  locationV+'_'+fromPrice+'_'+toPrice+'_'+propertyPurpose+'_'+propertyType;
  //alert (vars);
  window.location='<? echo $site['url']; ?>properties/'+ vars;

  
   
}




          </script>