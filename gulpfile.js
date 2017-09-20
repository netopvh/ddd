var gulp = require('gulp');
var concat = require('gulp-concat');
var cleanCss = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var less = require('gulp-less');
var rev = require('gulp-rev');
var rename = require('gulp-rename');

gulp.task('less', function () {
    return gulp.src([
        'resources/assets/less/_main_full/bootstrap.less',
        'resources/assets/less/_main_full/core.less',
        'resources/assets/less/_main_full/components.less',
        'resources/assets/less/_main_full/colors.less'
    ])
        .pipe(less())
        .pipe(concat('bundle.css'))
        //.pipe(cleanCss())
        .pipe(gulp.dest('public/backend/css'))
});

gulp.task('core', function () {
    return gulp.src(['resources/assets/js/plugins/loaders/pace.min.js',
        'resources/assets/js/core/libraries/jquery.min.js',
        'resources/assets/js/core/libraries/bootstrap.min.js',
        'resources/assets/js/plugins/loaders/blockui.min.js'])
        .pipe(concat('js/core.js'))
        //.pipe(uglify())
        //.pipe(rev())
        .pipe(gulp.dest('public/backend'));
});

gulp.task('theme', function () {
    return gulp.src([
        'resources/assets/js/plugins/forms/styling/switchery.min.js',
        'resources/assets/js/plugins/forms/selects/select2.min.js',
        'resources/assets/js/plugins/pickers/pickadate/picker.js',
        'resources/assets/js/plugins/pickers/pickadate/picker.date.js',
        'resources/assets/js/plugins/pickers/pickadate/legacy.js',
        'resources/assets/js/plugins/notifications/sweet_alert.min.js',
        'resources/assets/js/plugins/notifications/bootbox.min.js',
        'resources/assets/js/plugins/forms/validation/validate.min.js',
        'resources/assets/js/plugins/forms/validation/additional_methods.min.js',
        'resources/assets/js/plugins/forms/validation/localization/messages_pt_BR.js',
        'resources/assets/js/plugins/forms/styling/uniform.min.js',
        'resources/assets/js/plugins/ui/moment/moment.min.js',
        'resources/assets/js/plugins/ui/nicescroll.min.js'])
        .pipe(concat('js/theme.js'))
        .pipe(uglify())
        .pipe(rev())
        .pipe(gulp.dest('public/backend'));
});

gulp.task('modules', function () {
    return gulp.src(['resources/assets/js/modules/users.js'])
        .pipe(concat('users.js'))
        //.pipe(uglify())
        .pipe(rev())
        .pipe(gulp.dest('public/backend/js/modules'));
});

gulp.task('js', function () {
    return gulp.src(['resources/assets/js/core/app.js',
        'resources/assets/js/pages/layout_fixed_custom.js',
        'resources/assets/js/plugins/ui/ripple.min.js'])
        .pipe(concat('js/bundle.js'))
        .pipe(uglify())
        .pipe(rev())
        .pipe(gulp.dest('public/backend'))
        .pipe(rev.manifest())
        .pipe(gulp.dest('public/backend'));
});

gulp.task('fonts', function () {
    return gulp.src([
        'resources/assets/css/icons/fontawesome/fonts/*',
        'resources/assets/css/icons/glyphicons/*',
        'resources/assets/css/icons/icomoon/fonts/*',
        'resources/assets/css/icons/summernote/*'
    ])
        .pipe(gulp.dest('./public/backend/fonts'));
});

gulp.task('images', function () {
    return gulp.src([
        'resources/assets/images/**/**'
    ])
        .pipe(gulp.dest('./public/backend/images'));
});

gulp.task('icon-css', function () {
    return gulp.src([
        'resources/assets/css/icons/icomoon/styles.css'
    ])
        .pipe(rename("icoomon.css"))
        .pipe(cleanCss())
        .pipe(gulp.dest('./public/backend/css'));
});



gulp.task('default',['less','core','theme','js','fonts','images','icon-css']);