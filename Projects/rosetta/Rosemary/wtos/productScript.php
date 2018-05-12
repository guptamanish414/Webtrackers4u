<?
function parentCats($productcategoryId)
			{ 
			
			   global $os;
				
				$upList=$os->getByFld('productcategory','productcategoryId',$productcategoryId,'parentId');
				
				if($upList>0)	 
				{
					$os->parentCategory[]=$upList;
					parentCats($upList);	
				}
			}
			
			
			
			function getUplineCatIds($productcategoryId)
			{    global $os;   
			     $os->parentCategory=array();
				 
				 
				 if($productcategoryId>0){parentCats($productcategoryId);}				 
				 
				 
				 return  $os->parentCategory;	 	
			}
			
			function getUplineCatIdsStr($productcategoryId)
			{    
			
			if($productcategoryId>0){
			  $catids=getUplineCatIds($productcategoryId);
			  $catids[]=$productcategoryId;
			  return ','.implode(',',$catids).',';
			  }
				 
			}


 ?>
<script>
function getCategoryFeatures( featureIds,rowId)
{
  var url='ajaxProduct.php?featuresDiv=OK&featureIds='+featureIds+'&rowId='+rowId;
  
  	os.animateMe.div='featuresDivId';						
	os.animateMe.html='<img src="<?php echo $site['urlFront'];?>wtos-theme/images/ajax-loader.gif" alt="" border="0" />   <b style="font-size:18px;">Loading....</b>';

 // os.setAjaxFunc('featuresDiv',url);
   os.setAjaxHtml('featuresDivId',url);

}

function getFeaturesIds( rowId)
{

var ctgrObj=document.getElementsByName('ctgr[]'); 
var featureIdsObj=document.getElementsByName('featureIdsA[]'); 
var text='';
var l=featureIdsObj.length;
 
	for(i=0;i<ctgrObj.length;i++)
	{
	   if(ctgrObj[i].checked)
	   {
		  
		   text +=featureIdsObj[i].value;
		   
		
		}
	}
 
  getCategoryFeatures( text,rowId);
}




function featuresDiv(data)
{
 alert(data);
//featuresDivId
}

</script>