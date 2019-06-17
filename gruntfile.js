

module.exports = function(grunt) {

    // Load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    grunt.initConfig({

        // Watch for changes to the main file to trigger uglification and hinting
        watch: {
            css: {
                files: 'style.scss',
                tasks: ['sass']
            },
        },

        // Compile the saas file to css
        sass: {
            dist: {
                options: {
                    // Options are 'nested', 'compact', 'compressed', 'expanded'
                    style: 'compressed',
                },
                files: {
                    'style.css': 'style.scss',
                },
            },
        },

    });

    // Register the default task to watch for any changes to the main files
    grunt.registerTask('default', ['watch']);

};

