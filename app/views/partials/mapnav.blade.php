<div class="_mapnav">

  <?php $dd = All::getAllModels() ?>

  <div class="_brick pull-right">
    <div class="devs{{ Request::is('devs') ? ' active': ''}}">
      <a href="/devs"><div class="_strip">DEVELOPERS<span>({{ count($dd[0]) }})</span></div>
      <!-- <a href="/devs"><div class="_strip">DEVELOPERS<span>({{-- Dev::all()->count() --}})</span></div> -->
      <!-- <div class="_tail"></div> --></a>
    </div>
    <div class="orgs{{ Request::is('orgs') ? ' active': ''}}">
      <a href="/orgs"><div class="_strip">ORGANISATIONS<span>({{ count($dd[1]) }})</span></div>
      <!-- <a href="/orgs"><div class="_strip">ORGANISATIONS<span>({{-- Org::all()->count() --}})</span></div> -->
      <!-- <div class="_tail"></div> --></a>
    </div>
     <div class="eventts{{ Request::is('eventts') ? ' active': ''}}">
      <a href="/eventts"><div class="_strip">EVENTS<span>({{ count($dd[2]) }})</span></div>
      <!-- <a href="/eventts"><div class="_strip">EVENTS<span>({{-- Eventt::all()->count() --}})</span></div> -->
      <!-- <div class="_tail"></div> --></a>
    </div>
    <div class="projects{{ Request::is('projects') ? ' active': ''}}">
      <a href="/projects"><div class="_strip">PROJECTS<span>({{ count($dd[3]) }})</span></div>
      <!-- <a href="/projects"><div class="_strip">PROJECTS<span>({{-- Project::all()->count() --}})</span></div> -->
      <!-- <div class="_tail"></div> --></a>
    </div>
     <div class="stories{{ Request::is('stories') ? ' active': ''}}">
      <a href="/stories"><div class="_strip">STORIES<span>({{ count($dd[4]) }})</span></div>
      <!-- <a href="/stories"><div class="_strip">STORIES<span>({{-- Story::all()->count() --}})</span></div> -->
      <!-- <div class="_tail"></div> --></a>
    </div>
  </div>


  <div id="map-container" class="_bottom10"><div id="thedevsmap"></div></div>

  <div class="_alerts _bottom10" id="_alert">
    <div class="_alert _data">
    <span class="_dismiss pull-right"></span>
    <a href="/" class="_clearLS _hide pull-right _right10">Delete Pending Post</a>
    </div>
    <!-- <div class="_alert _bg-pink"><span class="_dismiss pull-right"></span></div> -->
  </div>

</div>