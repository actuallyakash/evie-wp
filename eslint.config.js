module.exports = [
	{
		files: [ 'assets/js/**/*.js' ],
		languageOptions: {
			ecmaVersion: 2021,
			sourceType: 'script',
			globals: {
				document: 'readonly',
				window: 'readonly',
			},
		},
		rules: {
			'no-undef': 'error',
			'no-unused-vars': 'error',
			'no-var': 'error',
			'prefer-const': 'error',
		},
	},
];
