module.exports = function(grunt) {
    //These plugins provide necessary tasks.
    grunt.loadNpmTasks('grunt-contrib-uglify'); //plugin pro minifikaci javascript souboru
    grunt.loadNpmTasks('grunt-contrib-cssmin'); //plugin pro minifikaci css souboru
    grunt.loadNpmTasks('grunt-contrib-copy');
    
    grunt.registerTask('default', [
      'cssmin:publicCSS',
      'uglify:publicJS',
      
      'cssmin:quickAdminCSS',
      'uglify:quickAdminJS',
      
      'copy:textCmpCopy',
    ]);
  
    grunt.initConfig({
	
        uglify: {
	    publicJS: {
              files: {
                '../www/js/gen/public.min.js':
                        [
                         'bower_components/jquery/dist/jquery.min.js',
			 'bower_components/jquery-ui/jquery-ui.min.js',
			 'bower_components/tether/dist/js/tether.min.js',
			 'bower_components/bootstrap/dist/js/bootstrap.min.js',
			 'bower_components/nette.ajax.js/nette.ajax.js',
			 'bower_components/nette-forms/src/assets/netteForms.js',
//			 'bower_components/nette.ajax.js/extensions/spinner.ajax.js',
			 'custom/public/js/*',
                        ]
              }
            },
	    quickAdminJS: {
              files: {
                '../www/js/gen/quickAdmin.min.js':
                        [
			 'bower_components/bootstrap/dist/js/bootstrap.min.js',
			 'bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js',
                        ]
              }
            },
//	    textCmpJS: {
//              files: {
//                '../www/assets/gen/textCmp/ckeditor/ckeditorBase/ckeditor.min.js':
//                        [
//			 'bower_components/ckeditor/ckeditor.js', //TODO: - nechat nakopírovávat soubory, na kterých je závislost v definovaném souboru (fonty, img, ostatní js...)
//                        ],
//		'../www/assets/gen/textCmp/ckeditor/config.js':
//			[
//			 'bower_components/ckeditor/config.js'
//			],
//		'../www/assets/gen/textCmp/ckeditor/lang/cs.js':
//			[
//			 'bower_components/ckeditor/lang/cs.js'
//			],
//		'../www/assets/gen/textCmp/ckeditor/styles.js':
//			[
//			 'bower_components/ckeditor/styles.js'
//			],
//              }
//            },
        },
        
       cssmin: {
            options: {
                keepSpecialComments: 0,
            },
            publicCSS: {
                src: [
		       'bower_components/bootstrap/dist/css/bootstrap.min.css',
		       'bower_components/components-font-awesome/css/font-awesome.min.css',
		       'bower_components/tether/dist/css/tether.min.css',
		       'bower_components/tether/dist/css/tether-theme-basic.min.css',
                       'custom/public/css/*',
                     ],
                dest: '../www/css/gen/public.min.css'
            },
	    quickAdminCSS: {
                src: [
			'bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css',
                     ],
                dest: '../www/css/gen/quickAdmin.min.css'
            },
//	    textCmpCSS: {
//                src: [
//			'bower_components/ckeditor/skins/moono/editor.css',
//                     ],
//                dest: '../www/assets/gen/textCmp/skins/moono/editor.css'
//            },
        },
	
	copy: {
	    textCmpCopy: {
	      cwd: 'bower_components/ckeditor',  // set working folder / root to copy
	      src: '**/*',           // copy all files and subfolders
	      dest: '../www/assets/ckeditor',    // destination folder
	      expand: true           // required when using cwd
	    }
	}
  });

};