<?php $site_url = $this->Url->build('/',true); ?> 
<!-- content -->

  <!-- main -->
  <div class="col">
    <!-- main header -->
    <div class="bg-light lter b-b wrapper-md">
      <div class="row">
        <div class="col-sm-6 col-xs-12">
          <h1 class="m-n font-thin h3 text-black">Dashboard</h1>
        </div>
      </div>
    </div>
    <!-- / main header -->
    <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
      <!-- stats -->
      <div class="row">
        <div class="col-md-5">
          <div class="row row-sm text-center">
            <div class="col-xs-6">
              <div class="panel padder-v item">
                <div class="h1 text-info font-thin h1">521</div>
                <span class="text-muted text-xs">Total Projects</span>
                <div class="top text-right w-full">
                  <i class="fa fa-caret-down text-warning m-r-sm"></i>
                </div>
              </div>
            </div>
            <div class="col-xs-6">
              <a href class="block panel padder-v bg-primary item">
                <span class="text-white font-thin h1 block">930</span>
                <span class="text-muted text-xs">Total Requirements</span>
                <span class="bottom text-right w-full">
                  <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
                </span>
              </a>
            </div>
            <div class="col-xs-6">
              <a href class="block panel padder-v bg-info item">
                <span class="text-white font-thin h1 block">432</span>
                <span class="text-muted text-xs">Total Design Tasks</span>
                <span class="top">
                  <i class="fa fa-caret-up text-warning m-l-sm m-r-sm"></i>
                </span>
              </a>
            </div>
            <div class="col-xs-6">
              <div class="panel padder-v item">
                <div class="font-thin h1">129</div>
                <span class="text-muted text-xs">Total QA Tasks</span>
                <div class="bottom">
                  <i class="fa fa-caret-up text-warning m-l-sm m-r-sm"></i>
                </div>
              </div>
            </div>
            <div class="col-xs-12 m-b-md">
              <div class="r bg-light dker item hbox no-border">
                <div class="col w-xs v-middle hidden-md">
                  <div ng-init="d3_3=[60,40]" ui-jq="sparkline" ui-options="[60,40], {type:'pie', height:40, sliceColors:['#fad733','#fff']}" class="sparkline inline"></div>
                </div>
                <div class="col dk padder-v r-r">
                  <div class="text-primary-dk font-thin h1"><span>670</span></div>
                  <span class="text-muted text-xs">High Priority Tasks</span>
                </div>
              </div>
            </div>
          </div>
        </div>
         <div class="col-md-7">
         <div class="panel wrapper">
        <div class="row">
            
          <div class="col-md-12 b-r b-light no-border-xs">
            
            <h4 class="font-thin m-t-none m-b-md text-muted">My Tasks
             <span class="text-xs text-muted pull-right">
                <i class="fa fa-circle text-primary m-r-xs"></i> 12
                <i class="fa fa-circle text-info m-r-xs m-l-sm"></i> 30
                <i class="fa fa-circle text-warning m-r-xs m-l-sm"></i> 98
              </span>
            </h4>
            
            <div class=" m-b">
              <div class="m-b">
                <span class="label text-base bg-warning pos-rlt m-r"><i class="arrow right arrow-warning"></i>High</span>
                <a href>Feed cat</a>
              </div>
              <div class="m-b">
                <span class="label text-base bg-info pos-rlt m-r"><i class="arrow right arrow-info"></i> Low</span>
                <a href>Fishing Time</a>
              </div>
              <div class="m-b">
                <span class="label text-base bg-primary pos-rlt m-r"><i class="arrow right arrow-primary"></i> Medium</span>
                <a href>Kick-off meeting</a>
              </div>
              <div class="m-b">
                <span class="label text-base bg-light pos-rlt m-r"><i class="arrow right arrow-light"></i> New</span>
                <a href>Morning running</a>
              </div>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
      <!-- / stats -->


    </div>
  </div>
  <!-- / main -->