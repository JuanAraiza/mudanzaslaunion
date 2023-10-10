<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> Lightbox ::  Responsive</title>
    <meta name="description" content=" A responsive lightbox for presenting modal content. " />
    <meta name="keywords" content="HTML, Sass, CSS, JS, JavaScript, framework, responsive, rwd, front-end, frontend, web development, boilerplate">
    <meta name="author" content="James South, and Responsive contributers">
    
 <!--   <script src="js/responsive.ie10mobilefix.min.js"></script>-->

    <link href="css/responsive.min.css" rel="stylesheet" />
    <!--<link href="css/docs.min.css" rel="stylesheet" />-->
    <!--<link href="css/prism.min.css" rel="stylesheet" />-->

    <!--[if lt IE 9 &!(IEMobile)]>
        <script src="/v2/assets/js/vendor/html5shiv.min.js"></script>
        <script src="/v2/assets/js/vendor/respond.min.js"></script>
    <![endif]-->
    
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/v2/assets/ico/apple-touch-icon-144x144.png" />
</head>
<body>
    <nav role="navigation">
        <div class="container">
            <div class="row">
                <a href="/v2/" rel="home">Responsive</a>
                <button data-dropdown-target="#navigation" class="visible-xs"><span class="visuallyhidden">Toggle Navigation</span></button>
                <div id="navigation" class="collapse"><a href="/v2/getting-started.html">Getting Started</a><a href="/v2/css/">CSS</a><a href="/v2/javascript/">JavaScript</a></div>
            </div>
        </div>
    </nav>

<main class="container" role="main">
    <header role="banner">
        ﻿




<ol class="breadcrumb">
    
    <li><a href="/v2">home</a> &#187; </li>

    
    
    

    <li><a href="/v2/javascript">javascript</a> &#187; </li>

    
    
    
    <li>lightbox</li>
</ol>

 
        <h1>
            Lightbox
            <span>A responsive lightbox for presenting modal content.</span>
        </h1>
    </header>
    <hr />
    <div class="row">
        <nav class="col-m-3" role="complementary">
            <h3>Contents</h3>
            <ul class="no-bullets">
    
       
       <li><a href="#examples">Examples</a></li>
    
       
       <li><a href="#markup">Markup</a></li>
    
       
       <li><a href="#methods">Methods</a></li>
    
       
       <li><a href="#events">Events</a></li>
    
       
       <li><a href="#dataapi">Data API</a></li>
    
</ul>

        </nav>
        <article class="col-m-9">
            <section id="normalize">
    <h1>Lightbox</h1>
    <p>A jQuery plugin that adds lightbox functionality to any element it targets. Uses CSS transitions to perform the animation.</p>
    <p>Comes with keyboard controls <kbd>ESC</kbd>, <kbd>LEFT</kbd>, and <kbd>RIGHT</kbd> to help navigation.</p>
    <p>On devices that support touch, grouped items will iterate though their collection via swiping <kbd>LEFT</kbd>, and <kbd>RIGHT</kbd></p>
    <p>
        Comes with a markup API that allows running the plugin without writing a single line of JavaScript.
        This is Responsive's first class API and should be your first consideration when using a plugin.
    </p>
    <hr />
    <section id="examples">
        <h1>Examples</h1>
        

        <h3>External target with iframe header and footer</h3>
        <a href="http://bbc.co.uk" data-lightbox-title="BBC" data-lightbox-description="<p>sample text or the footer.</p>">Launch external overlay</a>
       

       
        <h3>Form</h3>
        <a href="#" data-lightbox-target="#form-overlay" data-lightbox-fit-viewport="false">Launch internal overlay containing a form that should not stretch to the full viewport width.</a>
        <pre class="language-markup"><code>&lt;a href="#" data-lightbox-target="#form-overlay" data-lightbox-fit-viewport="false"&gt;
    Launch internal overlay containing a form
&lt;/a&gt;</code></pre>
        <div id="form-overlay" class="hidden">
            <form method="POST" action="#">
                <fieldset>
                    <legend>Default Form</legend>
                    <label for="field-one">Field One</label>
                    <input type="text" id="field-one" />
                    <label for="field-two">Field Two</label>
                    <select id="field-two">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </fieldset>
                <div class="form-actions">
                    <button type="submit">Save changes</button>
                    <button type="button">Cancel</button>
                </div>
            </form>
        </div>

       


    </section>
   
   

        </article>
    </div>
</main>
﻿<footer role="contentinfo" class="container">
    <hr>
    <div class="row">
        <div class="col-s-8">
            <p>
                <strong>Responsive</strong> is a responsive web development boilerplate built for your benefit by <a href="http://twitter.com/James_M_South" rel="author external"  data-ga-category="Home Actions" data-ga-action="Home Links" data-ga-label="Twitter View">@james_m_south</a>
            </p>
            <p>
                Excerpts of this code are based on the incredibly hard work by the good people responsible for <a href="http://necolas.github.io/normalize.css/"  rel="external nofollow">Normalize.css</a>, <a href="http://html5boilerplate.com/" rel="external nofollow" >HTML5 Boilerplate</a>, and <a href="http://getbootstrap.com/" rel="external nofollow" >Twitter Bootstrap</a>. 
            </p>
            <p>
                Licensed under the <a href="http://opensource.org/licenses/MIT" rel="external nofollow" >MIT License</a>.
            </p>
        </div>
        <div class="col-s-4">
            <div class="clearfix">
                <button class="to-top push-right">Back to Top ^</button>
            </div>
        </div>
    </div>
</footer>
<!--[if IE 8]>     
    <script src="/v2/assets/js/vendor/jquery-1.11.0.min.js"></script>
<![endif]-->
<!--[if gt IE 8]><!-->
<!--<script src="http://responsivebp.com/v2/assets/js/vendor/jquery-2.1.0.min.js"></script>-->
<script
			  src="https://code.jquery.com/jquery-2.1.0.js"
			  integrity="sha256-D6d1KSapXjq2tfZ6Ie9AYozkRHyB3fT2ys9mO2+4Wvc="
			  crossorigin="anonymous"></script>
<!--<![endif]-->
<!--<script src="js/prism.js"></script>-->
<script src="js/responsive.min.js"></script>
<!--<script src="js/docs.min.js"></script>-->

<!--<script src="js/ga-event-tracking.js"></script>-->
</body>
</html>
