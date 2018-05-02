<?php //echo $javascript->link('ddaccordion.js'); ?>
<script type="text/javascript">

//Initialize 2nd demo:
ddaccordion.init({
	headerclass: "menu_header", //Shared CSS class name of headers group
	contentclass: "sub", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc]. [] denotes no content.
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["closedlanguage", "openlanguage"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	//togglehtml: ["prefix", "[ + ] ", "[ - ] "], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "normal", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
		
	}
})

</script>
<style type="text/css">
.technology{ /*header of 2nd demo*/
cursor: hand;
cursor: pointer;
margin: 0px 0;
padding:0px;
}
.accordprefix{
	float:right;
}
.menu_header{
	/*width:155px;*/
}
.thelanguage{
	width:165px;
}
</style>

<?php $site_url = $this->Url->build('/',true); ?> 
<section id="mainMenu">
<nav>
	<ul>
	
	 
		<li class="menu_header"><a href="#">Global Settings</a></li>
			<ul class="sub">
				<li><a href="<?php echo $site_url.'admin/users/changePassword';?>">Change Password</a></li>
			</ul>
		

	   <li class="menu_header"><a href="#">Cms Management</a></li>
		<ul class="sub">
			<li><a href="<?php echo $site_url.'admin/maps/index';?>">Map Management</a></li>
			<li><a href="<?php echo $site_url.'admin/advertisements/index';?>">advertisement Management</a></li>
		</ul>
		
	  
		
		<li class="menu_header"><a href="#">Logout</a></li>
		<ul class="sub">
			<li><a href="<?php echo $site_url.'admin/users/logout' ;?>">Logout</a></li>
		</ul>
	</ul>
</nav>
</selction>