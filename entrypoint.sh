MY=(
    [ROLE]=app
    [RUN_AS]=www

    [APP_NAME]="${APP_NAME:-TurnKey Joomla}"
    [APP_USER]="${APP_USER:-admin}"
    [APP_MAIL]="${APP_MAIL:-admin@example.com}"
    [APP_PASS]="${APP_PASS:-}"
    [APP_SITE]="${APP_SITE:-}" # unused for now
    [APP_MODS]="${APP_MODS:-}" # TODO

    [DB_HOST]="${DB_HOST:-127.0.0.1}"
    [DB_USER]="${DB_USER:-joomla}"
    [DB_NAME]="${DB_NAME:-joomla}"
    [DB_PASS]="${DB_PASS:-$(secret consume DB_PASS)}"
    [DB_PREFIX]="${DB_PREFIX:-jos_}"
)

passthrough_unless 'php-fpm' "$@"

INITDB="${OUR[INITDBS]}/joomla.sql"
add vhosts joomla
web_extract_src joomla

SQL="${OUR[WEBDIR]}/installation/sql/mysql/joomla.sql"
sed -i "s|#__|${MY[DB_PREFIX]}|" "${SQL}"
cp "${SQL}" "${INITDB}"
unset SQL
# create admin user
echo "INSERT INTO ${MY[DB_PREFIX]}users (name, username, password, params) VALUES ('${APP_USER}', '${APP_USER}', MD5('${APP_PASS}'), '');" >> "${INITDB}"
echo "INSERT INTO ${MY[DB_PREFIX]}user_usergroup_map (user_id, group_id) VALUES (1, 8);" >> "${INITDB}"

random_if_empty APP_PASS

cp "${OUR[SRCDIR]}/configuration.php" "${OUR[WEBDIR]}"

for var in "${!MY[@]}"; do
    sed -i "s|%${var}|${MY[${var}]}|" "${OUR[WEBDIR]}/configuration.php"
done

rm -rf "${OUR[WEBDIR]}/installation"
chown -R www-data:www-data "${OUR[WEBDIR]}"

reload_vhosts
run "$@"
