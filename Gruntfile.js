module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      build: {
        src: 'webroot/js/senac.js',
        dest: 'webroot/js/senac.min.js'
      }
    },
    watch: {
      stylus: {
        options: {
          livereload: true,
        },
        files: [
          'webroot/css/styl/*.styl',
          'webroot/css/cms/styl/*.styl',
        ],
        tasks: ['stylus:compile'],
      },
      js: {
        files: [
          'webroot/js/senac.js'
        ],
        tasks: ['uglify'],
      },
    },
    stylus: {
      compile: {
        files: {
          'webroot/css/senac.min.css': 'webroot/css/styl/*.styl',
          'webroot/css/cms/cms.min.css': 'webroot/css/cms/styl/*.styl',
        }
      }
    }
  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-stylus');

  // Default task(s).
  grunt.registerTask('default', ['uglify', 'stylus:compile', 'watch']);

};
