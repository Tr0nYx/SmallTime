module.exports = function (grunt) {
    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            options: {
                banner: '/**\n * <%= pkg.name %>\n * Date: <%= grunt.template.today("yyyy-mm-dd H:MM:s") %>\n * Version: <%= pkg.version %>\n */'
            },
            libs: {
                src: 'build/js/libs-<%= pkg.version %>.js',
                dest: 'js/libs-<%= pkg.version %>.min.js'
            },
            build: {
                src: 'build/js/<%= pkg.name %>-<%= pkg.version %>.js',
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
                    'css/<%= pkg.name %>-<%= pkg.version %>.min.css': ['build/css/bootstrap.css', 'build/css/mdbootstrap.css', 'build/css/main.css']
                }
            }
        },
        sass: {
            dist: {
                options: {
                    style: 'expanded'
                },
                files: {
                    'build/css/bootstrap.css': './bower_components/bootstrap/scss/bootstrap.scss',
                    'build/css/mdbootstrap.css': './bower_components/MDBootstrap/scss/mdb.scss',
                    'build/css/main.css': './assets/styles/main.scss'
                }
            }
        },
        concat: {
            options: {
                separator: ';\n',
                stripBanners: true
            },
            libs: {
                src: [
                    './bower_components/jquery/dist/jquery.js',
                    './bower_components/bootstrap/dist/js/bootstrap.js'
                ],
                dest: './build/js/libs-<%= pkg.version %>.js'
            },
            core: {
                src: [
                    './bower_components/MDBootstrap/js/mdb.js',
                    './assets/js/*.js'
                ],
                dest: './build/js/<%= pkg.name %>-<%= pkg.version %>.js'
            }
        },
		copy: {
		  main: {
			files: [
			  // includes files within path
			  {expand: true, cwd: './bower_components/MDBootstrap/font', src: ['**'], dest: './font'},
			]
		  }
		}
    });
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-copy');
// Default task(s).
    grunt.registerTask('default', ['copy','sass','cssmin','concat','uglify']);
};