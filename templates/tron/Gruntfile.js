module.exports = function (grunt) {
    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            options: {
                banner: '/**\n * <%= pkg.name %>\n * Date: <%= grunt.template.today("yyyy-mm-dd H:MM:s") %>\n * Version: <%= pkg.version %>\n */'
            },
            build: {
                src: 'build/js/<%= pkg.name %>.js',
                dest: 'js/<%= pkg.name %>-<%= pkg.version %>.min.js'
            }
        },
        cssmin: {
            options: {
                mergeIntoShorthands: false,
                roundingPrecision: -1
            },
            target: {
                files: {
                    'css/<%= pkg.name %>-<%= pkg.version %>.min.css': ['build/css/bootstrap.css', 'build/css/main.css']
                }
            }
        },
        sass: {                              // Task
            dist: {                            // Target
                options: {                       // Target options
                    style: 'expanded'
                },
                files: {
                    'build/css/bootstrap.css': './bower_components/bootstrap/scss/bootstrap.scss',
                    'build/css/main.css': './assets/styles/main.scss'
                }
            }
        },
        concat: {
            options: {
                separator: ';\n',
                stripBanners: true
            },
            core: {
                src: [
                    './bower_components/jquery/dist/jquery.js',
                    './bower_components/bootstrap/dist/js/bootstrap.js',
                    './assets/js/*.js'
                ],
                dest: './build/js/<%= pkg.name %>.js'
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
// Default task(s).
    grunt.registerTask('default', ['sass','cssmin','concat','uglify']);
};