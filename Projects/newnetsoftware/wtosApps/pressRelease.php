<? global $os,$pageVar;?>
 
<div class="inner_page_block">
       	<div class="container">
              <div class="panel-group Press_panel" id="accordion">
                <?
                    $newsQuery = "SELECT * FROM  pressrelease where active='Active'  ORDER BY releaseDate ASC ";
                    $newsRs = $os->mq($newsQuery);
                    $counter = 1;

                    //_d($pageVar);

                    while ($news = $os->mfa($newsRs)) {
                      
                      //_d($news);

                      if ($news['pressReleaseId'] == $pageVar ['segment'] [2]) {
                        
                        $fCss = 'class="panel-collapse collapse in"';
                      }
                      else {
                        $fCss = 'class="panel-collapse collapse"';
                      }
                                            
                    ?>

                <div class="panel panel-default">
                   <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<? echo $news['pressReleaseId']?>"><? echo date("M",strtotime($news['releaseDate']))?> <? echo date("d",strtotime($news['releaseDate']))?> <? echo $news['title']?> </a>
                        </h4>
                  </div>
                   <div id="collapse<? echo $news['pressReleaseId']?>" <? echo $fCss ?>>
                        <div class="panel-body"> <? echo $news['details']?> </div>
                   </div>
               </div>

               <? ++ $counter; } ?>

                
              </div> 
       </div>
            
         </div>
         