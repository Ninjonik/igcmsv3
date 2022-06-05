<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../custom/templates/default/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../custom/templates/default/assets/img/favicon.png">
  <title>
    {$siteTitle}
  </title>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">

  <style>

  body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-size: .88rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    text-align: left;
    background-color: #eef1f3
}

.mt-100 {
    margin-top: 80px
}

.card {
    box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
    border-width: 0;
    transition: all .2s
}

.card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
}

.btn-primary.btn-shadow {
    box-shadow: 0 0.125rem 0.625rem rgba(63, 106, 216, 0.4), 0 0.0625rem 0.125rem rgba(63, 106, 216, 0.5)
}

.btn.btn-wide {
    padding: .375rem 1.5rem;
    font-size: .8rem;
    line-height: 1.5;
    border-radius: .25rem
}

.btn-primary {
    color: #fff;
    background-color: #3f6ad8;
    border-color: #3f6ad8
}

.form-control {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out
}

.card-body {
    flex: 1 1 auto;
    padding: 1.25rem
}

.flex-truncate {
    min-width: 0 !important
}

.d-block {
    display: block !important
}

a {
    color: #E91E63;
    text-decoration: none !important;
    background-color: transparent
}

.media img {
    width: 40px;
    height: auto
}

  </style>

  <style>

  @import url('https://fonts.googleapis.com/css2?family=Open+Sans&family=Vollkorn:ital,wght@0,600;1,500&display=swap');

  :root {
  --type-body: Open Sans, Helvetica, Arial, sans-serif;
  --type-quote: Vollkorn;
  --quote-image-width: 140px;
  --border-rad: 7px;
  --accent-color: hsl(237deg 48% 17%);
  --quote-bg: hsl(237deg 55% 14%);
  }


  *,
  *::before,
  *::after {
  box-sizing: border-box;
  }

  a {
  text-decoration: none;
  color: var(--accent-color);
  }

  a:hover,
  a:focus {
  text-decoration: underline;
  }

  body {
  margin: 15px 10px;
  font-family: var(--type-body);
  color: hsl(0 0% 15%);
  }

  .article {
  max-width: 900px;
  margin: auto;
  }

  blockquote {
  position: relative;
  margin: 40px 0;
  padding: 1.6em 2.4em .7em calc(1.4em + var(--quote-image-width));
  font: italic 1.2rem var(--type-quote);
  background: var(--quote-bg) no-repeat left / var(--quote-image-width);
  border-radius: var(--border-rad);
  border: 2px solid white;
  box-shadow: 2px 2px 4px hsl(0 0% 0% / 20%);
  text-indent: 1.6em;
  }

  @media (min-width: 768px) {
  blockquote {
    margin: 40px 60px;
  }
  }

  blockquote::before {
  content: "";
  pointer-events: none;
  position: absolute;
  z-index: 1;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  border-radius: var(--border-rad);
  box-shadow:
    inset -2px -2px 1px hsl(0 0% 100%),
    inset 2px 2px 4px hsl(0 0% 0% / 20%);
  }

  blockquote::after {
  content: "❝";
  position: absolute;
  z-index: 1;
  left: 50%;
  top: -2px;
  transform: translate(-50%, -50%);
  width: 1.3em;
  height: 1.3em;
  background: white;
  box-shadow: 0 4px 5px -1px hsla(0 0% 0% / 20%);
  border-radius: 999px;
  display: grid;
  place-content: center;
  padding-top: .5em;
  color: var(--accent-color);
  font-size: 36px;
  font-style: normal;
  text-indent: 0;
  }

  .blockquote-author-image {
  position: absolute;
  left: 0;
  top: 0;
  width: var(--quote-image-width);
  height: 100%;
  opacity: 0.75;
  background: var(--accent-color) var(--image) no-repeat center / cover;
  border-top-left-radius: var(--border-rad);
  border-bottom-left-radius: var(--border-rad);
  }

  cite {
  display: block;
  margin-top: 30px;
  text-indent: 0;
  text-align: center;
  font: bold .9rem var(--type-body);
  text-transform: uppercase;
  color: hsl(233 11% 83%);
  }

  @media (min-width: 768px) {
  cite {
    margin-left: calc(1rem - var(--quote-image-width));
  }
  }

  .cite-last-name {
  background: var(--accent-color);
  color: var(--quote-bg);
  }





  .controls {
  position: fixed;
  bottom: 10px;
  right: 10px;
  font-size: 0.8em;
  opacity: 0.7;
  transition: .2s;
  }

  .controls:hover,
  .controls:focus {
  opacity: 1;
  }

  .controls label {
  font-weight: bold;
  text-transform: lowercase;
  }

  .controls input {
  display: block;
  width: 100%;
  border: 0;
  outline: none;
  padding: 0;
  }

  </style>

  <script>

  document.querySelector('.js-accent-color').addEventListener('change', (e) => {
  document.documentElement.style.setProperty('--accent-color', e.target.value)
  })

  </script>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="../../use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/8fe68ee7cd.js" crossorigin="anonymous"></script>
  <!-- Nucleo Icons -->
  <link href="../../custom/templates/default/assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../../custom/templates/default/assets/css/blk-design-system-pro.mine209.css?v=1.0.0" rel="stylesheet" />

  <style>

  p {
  word-break: break-all;
  }
  div {
  word-break: break-all;
  }

  </style>
  <script src="../../custom/panel_templates/default/ckeditor/ckeditor.js"></script>


</head>

<body class="index-page">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg  fixed-top navbar-transparent " color-on-scroll="300">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="index" rel="tooltip">
          <span>{$siteTitle}</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a>
                {$siteTitle}
              </a>
            </div>
            <div class="col-6 collapse-close text-right">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="fa fa-cogs d-lg-none d-xl-none"></i> Články
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="posts" class="dropdown-item">
                <i class="tim-icons icon-single-copy-04"></i> Články
              </a>
              </a>
              <a href="myposts" class="dropdown-item">
                <i class="tim-icons icon-paper"></i> Moje články
              </a>
              </a>
              <a href="createpost" class="dropdown-item">
                <i class="tim-icons icon-pencil"></i> Pridať článok
              </a>
              </a>
            </div>
          </li>

          {if !empty($pages)}
          <li class="dropdown nav-item" {getmodulestatus id=6}>
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="fa fa-cogs d-lg-none d-xl-none"></i> Stránky
            </a>
            <div class="dropdown-menu dropdown-with-icons">

            {foreach from=$pages item=$pagel}
            <a href="viewpage?id={$pagel['id']}" class="dropdown-item">
              <i class="tim-icons {$pagel['icon']}"></i> {$pagel['title']}
            </a>
            {/foreach}

            </div>
          </li>
          {/if}

          {foreach from=$pluginpath item=$pluginspath}
            {include file="../plugins/$pluginspath.tpl"}
          {/foreach}

          <li class="nav-item">
            <a class="nav-link" href="forum">
              <p>Fórum</p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
              <p>Profil</p>
            </a>
              {$navbarprofile}
          </li>
          <!-- <li class="nav-item">
					<a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
						<i class="fab fa-twitter"></i>
						<p class="hidden-lg-up">Twitter</p>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
						<i class="fab fa-facebook-square"></i>
						<p class="hidden-lg-up">Facebook</p>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
						<i class="fab fa-instagram"></i>
						<p class="hidden-lg-up">Instagram</p>
					</a>
				</li> -->
        </ul>
      </div>
    </div>
	{$erroraction}
  </nav>
  <!-- End Navbar -->
