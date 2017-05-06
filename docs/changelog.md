[Home](sitemap.md) » Change Log

# Change Log

## Version 1.0.8

Released : 2015.02.10.

- `added` Tag for renderning links to public downloads:
          `<media:download class="myclass" />`, link  is  validated  with  SHA-1
          hash validation, class attribute is optional
- `added` Autocorrection on blur to url field of page and article
- `added` Extend field key is suggested from label
- `improve` FTL parser performance
- `refactor` Database driver - removed deprecated mysql_escape_string
- `added` Accordion to Element Definition List
- `fixed` Extend Lists inside Content Elements were not sortable
- `fixed` Prevent Content Element from crashing Item Manager
- `refactor` Made  content  element  edit  popup  generic  sized,  using more of
             the available screen size
- `added` Extend Fields show their key via title
- `added` Extend field key is suggested from label
- `fixed` Added missing refresh after delete extend field
- `fixed` Tagmanager PHP error handling for 'expression'  attribute evaluation
- `fixed` Naming home-page different to 'home' caused "undefined index" notice
- `fixed` Save orphan article: undefined index notice
- `fixed` Fixed extend field type integrity
- `fixed` Install directory detection on case sensitive systems
- `fixed` Navigation helper class attribute generation for navigation submenus
- `fixed` Permissions list in backend - the lock  symbols  in  the  menu are now
          displayed again
- `improve` Media browsing: made previous/next media button wrap-around
- `improve` Media list filter styles
- `fixed` Extend field model: fixed fatal typo in unlink_from_context()
- `added` Emails (contact, info, technical) of website  settings  are now preset
          from administrator during fresh installation
- `added` Optional article type relation on extend fields of articles
- `added` Number.formatMoney()
- `added` Backend font size can now be changed in settings
- `added` New watermark function
- `fixed` Remove tag from item did not work
- `added` Tags and Categories can now be assigned to pages as well
- `fixed` Article linking receiver_rel condition
- `added` New extend field type: Color
- `fixed` Clear field option in edit-media popup
- `added` Mac specific style for mocha window (backend popups) titlebar
- `added` Additional save (without close) button to media popup
- `added` Options to browse to next/previous media to media popup
- `added` "Select all files" option to filemanager
- `added` Simple log system
- `added` Ionize  backend  overlay  in  frontend  can  now be  configured  to be
          positioned alternatively to the right border
- `added` Active view mode of media list is now highlighted
- `added` Optional website  HTML  source  beautifier  (indent,  merge + minify +
          move inline JS to bottom, reduce whitespace, etc)
- `fixed` Made installer work on PHP >= 5.5
- `added` Active pagetree items are now visually marked
- `added` Shortcut button to quickly return to page from article editing
- `added` Backend login initially focusses the username field now
- `added` "active" classname to current page in breadcrumps
- `added` "Delete thumbs" option to advanced settings
- `refactor` Codeigniter's  (core mod.)  delete  files  can  now  handle  hidden
             files / directories
- `fixed` JS error - Article edit view didn't display media list
- `added` When there's only one language in settings, it's automatically activated
- `added` Page attribute id_parent to page tag manager
- `added` Article editing options panel now contains option to select article type
- `added` New content element can be saved via enter key
- `fixed` Expand/Collapse pagetree nodes
- `added` Advanced settings now  has option to remove  deleted  pages  and  rel.
          entities from DB
- `added` Support for multilingual sitemap generation.
- `improve` Sitemaps no longer add offline pages.
- `improve` Improved MySqlI driver
- `fixed` SEO options correction
- `fixed` memory_limit checks when it is disabled
- `improve` Improved media unsharp filter, static items, new extend "Color picker"
- `fixed` is_dir parameter of Event:fire of  Filemanager.destroy.success method.
          Also respect the open_basedir restriction when deleting
- `fixed` File upload when memory_limit in php configured to have no limits
- `fixed` Corrected password validation and creation of new user
- `added` Youtube reduced URL management in get_service_info()
- `added` Content element links
- `fixed` Success and error messages of AJAX form
- `fixed` Date remove corrections
- `added` Static items sortable
- `fixed` Role deletion
- `added` Clean unused language depending settings to clean tables handling
- `added` Changelog

## Version 1.0.7

Released : 2014.08.06.

## Version 1.0.6

Released : 2014.04.08.

## Version 1.0.5

Released : 2014.01.22.

## Version 1.0.4

Released : 2013.07.06.

## Version 1.0.3

Released : 2013.06.28.

## Version 1.0.2

Released : 2013.05.31.

## Version 1.0.1

Released : 2013.05.30.

## Version 1.0.0

Released : 2013.03.26

- Role based permissions : For Backend, Frontend and modules
- Events in ionize : Core fires events which can be catch by modules

## Version 0.9.9

Released : 2012.12.29.

- Complete rewrite of frontend tags : Basis stays the same, but the tags are more logical
- `Form` and `User` tags replaces the modules Simpleform and Usermanager
- Backend enhancements

## Version 0.9.8

Released : -

- Pages "full" URLs : URLs uses the complete nested path of pages
- Standardization of backend panels

## Version 0.9.7

Released : 2011.09.02.

- Focus on tinyMCE integration
- Upgrade of the backend to CodeIgniter 2 and mootools 1.3.1
- Better module management
- New Filemanager
- Content Elements : Developpers can create their own complex data
- Module : Simpleform, to create forms
- Module : Usermanager, to manage advanced user's features : login, logout, profile

## Version 0.9.6

Released : 2010.11.28.

- Features
  Articles can be linked to more than one page. Each article can have its own type and view, depending on the parent page.
  CKEditor and KCFinder are available as replacement for tinyMCE / tinyBrowser.
  Articles "Drag'n'Drop" ordering directly in the tree.
  No tree refreshing after articles ordering in one page.
  Page and Article editing more visual.
  Page and Article creation more logical.
  Article and page "tab" memory. When editing an article or page in one language, navigation to another item opens the same tab.
  More tooltips in admin panel.
  Static translations rewritten. The editor can add his own terms.

- Views and tags
  `<ion:navigation />` become more simple and more flexible. The output HTML is managed by a helper.
  Extend fields now outputs the default value if the default value is set.
  If no view are defined for page and articles in the theme, Ionize now uses the default one from /application/views/default/
  filters more consistent : "OR" filter correction for `<ion:articles filter="name:='TOTO' OR name:='TITI'" />`

- Bugs correction
  Corrected removing of an external link in a Page or Article.
  Articles and page internal link correction.
  Connect lib group ID retrieve bug corrected.
