

<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="media/media/css/material.min.css">
	<script src="media/media/js/material.min.js"></script>
    </head>
    <body>
	<?php 
	// No direct access
	defined('_JEXEC') or die; ?>
	
        <!-- Uses a transparent header that draws on top of the layout's background -->
<style>
.demo-layout-transparent {
  background: url('/media/media/images/ideargg1.png') center / cover;
  max-width: 100%;
  height: 371px;
}
.mdl-layout__container {
    height: 371px;
  position: relative;
  max-width: 940px;
}
.demo-layout-transparent .mdl-layout__header,
.demo-layout-transparent .mdl-layout__drawer-button {
  /* This background is dark, so we set text to white. Use 87% black instead if
     your background is light. */
  color: white;
}

a.mdl-layout-title {
    color: white;
}

.mdl-layout__header-row .mdl-navigation__link{
	padding-left: 10px !important;
	padding-right: 10px !important;
}

.mdl-layout__drawer.is-visible {
    background-color: #8bc34a;
}

.mdl-layout__drawer.is-visible {
    font-size: 15px;
    color: white;
}

a.mdl-navigation__link {
    color: white !important;
}

a.mdl-navigation__link.visible:hover {
    color: black !important;
}
</style>

  <div class="demo-layout-transparent mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--transparent">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <a class="mdl-layout-title" href="/home">ARTISTS IN DANGER</a>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="/home">Home</a>
        <a class="mdl-navigation__link" href="/artists">Artists</a>
        <a class="mdl-navigation__link" href="/about">About</a>
        <a class="mdl-navigation__link" href="/projects">Projects</a>
	<a class="mdl-navigation__link" href="/impressions">Impressions</a>
	<a class="mdl-navigation__link" href="/events">Events</a>
	<a class="mdl-navigation__link" href="/support-us">Support Us</a>
	<a class="mdl-navigation__link" href="/contact">Contact</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">ARTISTS</br>IN DANGER</span>
    <nav class="mdl-navigation">
	<a class="mdl-navigation__link visible" href="/home#content">Home</a>
        <a class="mdl-navigation__link visible" href="/artists#content">Artists</a>
        <a class="mdl-navigation__link visible" href="/about#content">About</a>
        <a class="mdl-navigation__link visible" href="/contact#content">Projects</a>
	<a class="mdl-navigation__link visible" href="/impressions#content">Impressions</a>
	<a class="mdl-navigation__link visible" href="/events#content">Events</a>
	<a class="mdl-navigation__link visible" href="/support-us#content">Support Us</a>
	<a class="mdl-navigation__link visible" href="/contact#content">Contact</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
  </main>
  </div>
    </body>
</html>
