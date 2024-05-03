module.exports = {
	plugins: {
		'tailwindcss/nesting': {},
		tailwindcss: {},
		'postcss-prefix-selector': {
			prefix: '.wp-block-post-content',
			ignoreFiles: ['frontend.css'],
		},
		autoprefixer: {},
	},
};
