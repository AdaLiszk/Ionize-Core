CREATE VIEW `contents` AS
  SELECT
    ch.id,
    u.cname,
    cb.id_language,
    lng.name as 'language',
    ch.name as 'content',
    lng.uri as 'uri_prefix',
    u.uri,
    cb.uri_short,
    cb.uri_long,
    ch.id_author,
    usr.name as 'author',
    usr.email as 'author_email',
    usr.forname as 'author_forname',
    usr.lastname as 'author_lastname',
    usr.login as 'author_nick',
    usr.extends as 'author_extends',
    ch.created_at,
    ch.updated_at,
    ch.published,
    ch.publishing_time,
    ch.unpublishing_time,
    ch.indexed,
    ch.flag,
    ch.scope,
    ch.generation,
    ch.childrends,
    ch.extends as 'extends_fields',
    cb.title,
    cb.subtitle,
    cb.title_window,
    cb.title_menu,
    cb.preview,
    cb.content as 'body',
    cb.seo_keywords,
    cb.seo_description,
    cb.seo_schema,
    cb.seo_schema_data,
    cb.seo_priority,
    cb.extends as 'extends_datas',
    ch.deleted_at

  FROM content_heads ch
    LEFT JOIN users usr ON (usr.id = ch.id_author)
    LEFT JOIN content_bodies cb ON (cb.id_content = ch.id and cb.id_revision = ch.id_revision)
    LEFT JOIN languages lng ON (lng.id = cb.id_language)
    LEFT JOIN  urls u ON (ch.id = u.id_content)