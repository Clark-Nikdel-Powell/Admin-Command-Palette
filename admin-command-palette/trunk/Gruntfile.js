/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    // Metadata.
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options: {
        banner: '<%= banner %>'
      },
      admin: {
        files: {
          'admin/js/admin-command-palette-admin.min.js': ['admin/js/pre/admin-command-palette-admin.js']
        }
      },
      public: {
        files: {
          'public/js/admin-command-palette-public.min.js': ['public/js/pre/admin-command-palette-public.js']
        }
      }
    },
    jshint: {
      options: {
        curly: true,
        eqeqeq: true,
        immed: true,
        latedef: true,
        newcap: true,
        noarg: true,
        sub: true,
        undef: true,
        unused: true,
        boss: true,
        eqnull: true,
        browser: true,
        globals: {}
      },
      admin: {
        src: ['admin/js/pre/**/*.js']
      },
      public: {
        src: ['public/js/pre/**/*.js']
      },
    },
    sass: {
      admin: {
        options: {
          style: 'compressed',
          sourcemap: 'auto'
        },
        files: {
          'admin/css/admin-command-palette-admin.css': ['admin/css/pre/admin-command-palette-admin.scss']
        }
      },
      public: {
        options: {
          style: 'compressed',
          sourcemap: 'auto'
        },
        files: {
          'public/css/admin-command-palette-public.css': ['public/css/pre/admin-command-palette-public.scss']
        }
      }
    },
    watch: {
      sass_admin: {
        files: 'admin/css/pre/**/*.{scss,sass}',
        tasks: ['sass:admin']
      },
      sass_public: {
        files: 'public/css/pre/**/*.{scss,sass}',
        tasks: ['sass:public']
      },
      js_admin: {
        files: 'admin/js/pre/**/*.js',
        tasks: ['jshint:admin', 'uglify:admin']
      },
      js_public: {
        files: 'public/js/pre/**/*.js',
        tasks: ['jshint:public', 'uglify:public']
      }
    }
  });

  // These plugins provide necessary tasks.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task.
  grunt.registerTask('default', ['jshint', 'uglify']);

};