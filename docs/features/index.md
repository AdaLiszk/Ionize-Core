[Home](../sitemap.md) » Features

# Core principles

What Ionize want to achive?

> **#1 - Be Multilingual and SEO friendly**  
  The core should build  on multilingual  so when it's needed is there and does
  not require  huge structural  changes in database or in code just to have it.
  Also it's a CMS so SEO is mandatory.

> **#2 - Have a Clear and Standalone Administration panel**  
  The administration panel should not build exclusivley to Ionize, it should be
  an application which with the correct API's could work in any system.

> **#3 - Have an efficient Filemanager and Assets handler with Caching**  
  The content's assets should be  mapped correctly  so a system could push them
  to the client's browser for achieve faster page loads.

> **#4 - Everything should be accessible by public API's**  
  Restricting a dedicated  server backend to  render your website is not a good
  usecase, the backend code should  not debepd on the frontend implementations.

> **#5 - Support Progressive Enhancments and modern Web technologies**  
  Web is evolving  really fast, the  backend systems has to follow them, server
  side push, eTag handling,  websockets should  be implemented  by default. The
  backend code should avare of node modules and bower packages.

> **#6 - Dont extend beyond the a core CONTENT management**  
  The core system should not have  multiple  way to  handle  contents, they are
  equivalent but some of them has some extended data in it.

> **#7 - Use Composer, PSR Standards and SOLID**  
  An open source  application should  prepare for  developers  who  extend it's
  functionality to  their own needs,  that's  require a  common standard coding
  soliltion. The CMS should be usable as a package in a much bigger project.

# DEVELOPMENT

This repository is  in active  development,  the features are  not complete yet
but at least I have a list what we want to add it to the code.

- [x] Composer, PSR Standards and SOLID
- [ ] SEO Optimized, integrated Google Analytics and Webmaster Tools
- [ ] Add custom javascript and style for content, page, article
- [ ] Access to the scripts and styles, minifier and autoincluder
- [ ] Support bower and webcomponents for theme and minify them with layouts
- [ ] Menu and Content split, add Content to multiple menu item
- [ ] Moving trough the Hiearchy in Content class (parent, children)
- [ ] Version Control For Content, Revisor publishing the changes
- [ ] Master Template, Desktop/Mobile Templates, Layouts
- [ ] Language/Group based Template overrides
- [ ] Search Aricles and Pages on Admin, better Article management
- [ ] Form Manage on Administration (configure items and actions)
- [ ] Multiple file move, copy trough the MediaManager
- [ ] Update Notification for Plugins and the System
- [ ] Support the current Ionize tags, but parsing like a template system
- [ ] Support other Database than MySQL
