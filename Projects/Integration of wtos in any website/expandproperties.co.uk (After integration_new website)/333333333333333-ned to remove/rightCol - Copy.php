<h2>Find Your Home </h2>

<form>

    <div class="form-group">

        <label for="exampleInputEmail1"></label>

        <select name="location" id="location" class="form-control">

          <option value="">Select Location

			<? $locations=$os->get_propertylocation(" active=1",' title ','');

            

            foreach($locations as $loc){

            ?>	

            <option value="<? echo $loc['title'] ?>">&nbsp;<? echo $loc['title'] ?></option>	

            <?  } ?>

          </option>

        </select>

   </div>

   <div class="form-group">

        <label for="exampleInputEmail1"></label>

        <select name="purposeLett" id="purposeLett" class="form-control">

            <option value="lettingResidential">Residential</option>

            <option value="lettingCommercial">Commercial</option>

        </select>

   </div>

   <div class="row">

     <div class="col-md-6 col-xs-6">

    <div class="form-group">

        <label for="exampleInputEmail1"></label>

        <select name="fromPrice" id="fromPrice" class="form-control">

          	<option  value="">&nbsp;From</option>

            <option  value="100">&nbsp;<? echo $os->currency ?>100 </option>

            <option  value="200">&nbsp;<? echo $os->currency ?>200</option>

            <option  value="300">&nbsp;<? echo $os->currency ?>300</option>

            <option  value="400">&nbsp;<? echo $os->currency ?>400</option>

            <option  value="500">&nbsp;<? echo $os->currency ?>500</option>

            <option  value="600">&nbsp;<? echo $os->currency ?>600</option>

            <option  value="700">&nbsp;<? echo $os->currency ?>700</option>

            <option  value="800">&nbsp;<? echo $os->currency ?>800</option>

            <option  value="900">&nbsp;<? echo $os->currency ?>900</option>

            <option  value="1000">&nbsp;<? echo $os->currency ?>1,000</option>

        </select>

   </div>

   </div>

   <div class="col-md-6 col-xs-6">

    <div class="form-group">

        <label for="exampleInputEmail1"></label>

        <select name="toPrice" id="toPrice" class="form-control">

                <option>&nbsp;To</option>

                <option  value="100">&nbsp;<? echo $os->currency ?>100 </option>

                <option  value="200">&nbsp;<? echo $os->currency ?>200</option>

                <option  value="300">&nbsp;<? echo $os->currency ?>300</option>

                <option  value="400">&nbsp;<? echo $os->currency ?>400</option>

                <option  value="500">&nbsp;<? echo $os->currency ?>500</option>

                <option  value="600">&nbsp;<? echo $os->currency ?>600</option>

                <option  value="700">&nbsp;<? echo $os->currency ?>700</option>

                <option  value="800">&nbsp;<? echo $os->currency ?>800</option>

                <option  value="900">&nbsp;<? echo $os->currency ?>900</option>

                <option  value="1000">&nbsp;<? echo $os->currency ?>1,000</option>

                <option  value="0">&nbsp;No Limit</option>

        </select>

     </div>

   </div>

   </div>

   <a href="javascript:void(0)" value="Search" onClick="searchProp()" class="button">Search</a>

</form>



<script> 

function searchProp()

{

	

	var type='Lettings';

	var locationV=os.getVal('location');

	var fromPrice=os.getVal('fromPrice');

	var toPrice=os.getVal('toPrice');

	var purposeTypeValue=os.getVal('purposeLett');

	

	//var bedV=os.getVal('bed');

	var bedV='';

	 

		

	var vars=  locationV+'_'+fromPrice+'_'+toPrice+'_'+bedV;

	window.location='<? echo $site['url']; ?>'+purposeTypeValue+'/'+ vars;

	//alert(vars);

}







</script>