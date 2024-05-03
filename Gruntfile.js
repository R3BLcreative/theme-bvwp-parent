module.exports = function (grunt) {
	// Project config
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		compress: {
			dist: {
				options: {
					archive: './dist/<%= pkg.name %>.zip',
					mode: 'zip',
				},
				files: [
					{ src: './blocks/**/*.{php,json,svg}', dest: '<%= pkg.name %>/' },
					{ src: './css/*.css', dest: '<%= pkg.name %>/' },
					{ src: './icons/*.svg', dest: '<%= pkg.name %>/' },
					{ src: './includes/*.php', dest: '<%= pkg.name %>/' },
					{ src: './js/*.js', dest: '<%= pkg.name %>/' },
					{ src: './partials/*.php', dest: '<%= pkg.name %>/' },
					{ src: './plugin-update-checker/**', dest: '<%= pkg.name %>/' },
					{ src: './style.css', dest: '<%= pkg.name %>/' },
					{ src: './*.php', dest: '<%= pkg.name %>/' },
					{ src: './screenshot.png', dest: '<%= pkg.name %>/' },
				],
			},
		},
		'string-replace': {
			dist: {
				files: { './': ['style.css'] },
				options: {
					replacements: [
						{
							pattern: '<%= pkg.last_version %>',
							replacement: '<%= pkg.version %>',
						},
					],
				},
			},
		},
	});

	// grunt.registerTask('manifest', function (key, value) {
	// 	// Get config package.json
	// 	var pkg = grunt.config.get('pkg');

	// 	// Set changing props & default props
	// 	var website = 'https://r3blcreative.com';
	// 	var rootPath = website + '/r3bl-updates/themes/' + pkg['name'] + '/';

	// 	var wp = {
	// 		version: pkg['version'],
	// 		requires: '6.4.3',
	// 		requires_php: '8.0.0',
	// 		download_url: rootPath + pkg['name'] + '.zip?v=' + pkg['version'],
	// 		details_url: rootPath + 'changelog.html',
	// 	};

	// 	// Path to write/update file
	// 	var infoJsonFile = './dist/info.json';

	// 	// Write/update file
	// 	grunt.file.write(infoJsonFile, JSON.stringify(wp));
	// });

	// Load grunt plugins
	grunt.loadNpmTasks('grunt-contrib-compress');
	grunt.loadNpmTasks('grunt-string-replace');

	// Register tasks
	// grunt.registerTask('default', ['string-replace', 'compress', 'manifest']);
	grunt.registerTask('default', ['string-replace', 'compress']);
};
