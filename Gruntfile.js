module.exports = function( grunt ) {

	'use strict';
	var banner = '/**\n * <%= pkg.homepage %>\n * Copyright (c) <%= grunt.template.today("yyyy") %>\n * This file is generated automatically. Do not edit.\n */\n';
	// Project configuration
	grunt.initConfig( {

		pkg: grunt.file.readJSON( 'package.json' ),

		addtextdomain: {
			options: {
				textdomain: 'site-creation-utilities',
			},
			target: {
				files: {
					src: [ '*.php', '**/*.php', '!node_modules/**', '!php-tests/**', '!bin/**' ]
				}
			}
		},

                bump: {
                        options: {
                                files: ['package.json', 'site-creation-utilities.php', 'readme.txt'],
                                commitMessage: 'Site Creation Utilities %VERSION%',
                                commitFiles: ['package.json', 'site-creation-utilities.php', 'readme.txt', 'README.md', 'languages/site-creation-utilities.pot'],
                                push: false,
                                tagName: '%VERSION%',
                                tagMessage: 'Site Creation Utilities %VERSION%',
                                regExp: new RegExp('([\'|\"]?(?:version|stable tag)[\'|\"]?[ ]*:[ ]*[\'|\"]?)(\\d+\\.\\d+\\.\\d+(-rc\\.\\d+)?(-\\d+)?)[\\d||A-a|.|-]*([\'|\"]?)', 'i'),
                        }
                },

		wp_readme_to_markdown: {
			your_target: {
				files: {
					'README.md': 'readme.txt'
				}
			},
		},

		makepot: {
			target: {
				options: {
					domainPath: '/languages',
					mainFile: 'site-creation-utilities.php',
					potFilename: 'site-creation-utilities.pot',
					potHeaders: {
						poedit: true,
						'x-poedit-keywordslist': true
					},
					type: 'wp-plugin',
					updateTimestamp: true
				}
			}
		},

		phpcs: {
			application: {
				src: ['*.php']
			},
			options: {
				bin: 'vendor/bin/phpcs',
				standard: 'WordPress-Core'
			}
		}
	} );

	grunt.loadNpmTasks( 'grunt-phpcs');
	grunt.loadNpmTasks( 'grunt-wp-i18n' );
	grunt.loadNpmTasks( 'grunt-wp-readme-to-markdown' );
	grunt.loadNpmTasks( 'grunt-bump' );
	grunt.registerTask( 'i18n', ['addtextdomain', 'makepot'] );
	grunt.registerTask( 'readme', ['wp_readme_to_markdown'] );
	grunt.registerTask( 'standards', ['phpcs'] );

	grunt.util.linefeed = '\n';

};
