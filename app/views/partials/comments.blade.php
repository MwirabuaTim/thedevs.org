<!-- comments by disqus -->
<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'thedevsorg'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>

<div class="pull-right">
{{ link_to_route('devs.index', 'Devs', null, array('class' => 'btn btn-sm btn-link')) }}
{{ link_to_route('orgs.index', 'Orgs', null, array('class' => 'btn btn-sm btn-link')) }}
{{ link_to_route('eventts.index', 'Events', null, array('class' => 'btn btn-sm btn-link')) }}
{{ link_to_route('projects.index', 'Projects', null, array('class' => 'btn btn-sm btn-link')) }}
{{ link_to_route('stories.index', 'Stories', null, array('class' => 'btn btn-sm btn-link')) }}
{{--! link_to_route('home', 'Home', null, array('class' => 'btn btn-sm btn-link pull-right')) --}}
</div>