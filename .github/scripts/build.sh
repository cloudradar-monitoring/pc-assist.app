pwd
ls -la
printenv
composer install -q --no-plugins --no-scripts --no-progress --optimize-autoloader --no-interaction --ignore-platform-reqs --no-dev
mv .env.production .env
ls -la
export VERSION=$(date +%s)
export BUILD=build-${VERSION}.tar.gz
date>build.txt
echo "BUILD=${BUILD}">>.vars
git log -1>git.log
# Create the artifacts file first, otherwise you will get an error "file changed as we read it"
touch $BUILD
tar --exclude=$BUILD \
    --exclude=./tests  \
    --exclude=.git* \
    --exclude=.vars \
    --exclude=phpunit.xml \
    --exclude=composer.* \
    --exclude=phpunit.xml \
-zcf $BUILD .
ls -lah
md5sum $BUILD
