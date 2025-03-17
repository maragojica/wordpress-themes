// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;

module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files trigger a rebuild.
		'./theme/**/*.php',
	],
	theme: {
		// Extend the default Tailwind theme.
		extend: {
			fontFamily: {
				'primary-font' : ['hanken-grotesk', 'sans-serif'],
				'secondary-font': ['hanken-grotesk', 'sans-serif'],
				'text-font': ['hanken-grotesk', 'sans-serif'],				
				
			},
			colors: {
				primary: {              //Primary Teal					
					DEFAULT: '#00A2B2',		
					light: '#00a2b226'			
				  },
				  secondary: {	         //Secondary Darker Teal				
					DEFAULT: '#004850',
				  },
				  foreground: {	         //Foregroung Dark Grey							
					DEFAULT: '#777',					
				  },
				  accent: {	             //Accent Light Grey	
					DEFAULT: '#b6b8ba',		
					dark: '#B6B8BA',						
				  },
				 
			  },
			  fontSize: {
				// Define custom title sizes

				mainmenu: ['20px',  {   // Main Menu Link (base 20px)								
					letterSpacing: '1.8px', 					
				}],
				'mainmenu-sm': '16px',
				 body: '1.1rem',         // Main body text  text (base 22px)
			   },
			   container: {
				center: true, // Centers the container
				padding: {
				  DEFAULT: '1rem', // Default padding for all screen sizes
				  xl: '2rem',
				  '2xl': '1.5rem',
				 
				},

				screens: {
				  sm: '100%',      // Full width for small screens		
				  lg: '1200px',  
				  xl: '1440px',    // Custom max width for extra large screens				 
				  '2xl': '1520px', // Custom max width for 2X large screens	
				  				  					  				  	  
				},
				
			  },
			  screens: {	
				'xxs' : '375px',
				'xs' : '480px',
				'large' : '1200px',  
				'xlarge' : '1440px',    	 
				'2xlarge' : '1520px', 
				'3xl' : '2000px',		
				'4k' : '2560px',  // Ultra-wide screens
			  },
		},
	},
	corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		// Add Tailwind Typography (via _tw fork).
		require('@_tw/typography'),
		function ({ addBase }) {
			// Define custom headline sizes
			addBase({
				h1: {       // H1 (base 100px - 6.25rem)
					fontFamily: 'hanken-grotesk, sans-serif', 
					fontSize: '34px',
					lineHeight: 'normal',
					fontWeight: '900',					
					color: '#004850',
					'@screen xs': { fontSize: '38px' }, // Small screens and above
					'@screen sm': { fontSize: '2.4rem' }, // Small screens and above
					'@screen md': { fontSize: '2.9rem' }, // Medium screens and above
					'@screen lg': { fontSize: '3.1rem' }, // Large screens and above
					'@screen 2xl': { fontSize: '100px' }, // 2ExtraLarge screens and above
				  },

				h2: {        // H2 (base 60px - 3.75rem)
					fontFamily: 'hanken-grotesk, sans-serif', 
					fontSize: '32px',
					lineHeight: '1.1',
					fontWeight: '800',					
					color: '#004850',
					'@screen sm': { fontSize: '2.2rem', }, // Small screens and above
					'@screen md': { fontSize: '2.5rem', }, // Medium screens and above
					'@screen lg': { fontSize: '2.3rem', }, // Large screens and above
					'@screen 2xl': { fontSize: '60px' }, // 2ExtraLarge screens and above
				},	
				
				h3: {     // H3 (base 32px - 2rem)
					fontFamily: 'hanken-grotesk, sans-serif', 
					fontSize: '24px',
					lineHeight: 'normal',
					fontWeight: '800',							
					color: '#00A2B2',						
					'@screen lg': { fontSize: '30px', }, // Large screens and above		
					'@screen 2xl': { fontSize: '32px' }, // 2ExtraLarge screens and above					
				},	

				h4: {     // H4 (base 28px)
					fontFamily: 'hanken-grotesk, sans-serif', 
					fontSize: '22px',
					lineHeight: 'normal',
					fontWeight: '800',						
					color: '#777777',	
					'@screen lg': { fontSize: '1.3rem', }, // Large screens and above			
					'@screen xl': { fontSize: '28px', }, // Extra Large screens and above				
				},	

				h5: {     // H5 (base 26px)
					fontFamily: 'hanken-grotesk, sans-serif', 
					fontSize: '26px',
					lineHeight: '1.3',
					fontWeight: '800',								
					color: '#777',					
				},	

				h6: {     // H6 (base 14px)
					fontFamily: 'hanken-grotesk, sans-serif', 
					fontSize: '22px',
					lineHeight: '1.2',
					fontWeight: '400',									
					color: '#777',					
				},	

				p: {
					fontFamily: 'hanken-grotesk, sans-serif', 
					fontSize: '16px',
					lineHeight: '1.5',
					fontWeight: '400',										
					'@screen lg': { fontSize: '20px', lineHeight: '1.5', // Large screens and above	
					}, 		
					'@screen 2xl': { fontSize: '22px', lineHeight: '1.6', // Extra Large screens and above			
					}, 
				},

				ul: {
					fontFamily: 'hanken-grotesk, sans-serif', 
					fontSize: '16px',
					lineHeight: '1.5',
					fontWeight: '400',					
					color: '#777',
					'@screen lg': { fontSize: '22px', lineHeight: '1.6', // Large screens and above	
					}, 
				},

				ol: {
					fontFamily: 'hanken-grotesk, sans-serif', 
					fontSize: '16px',
					lineHeight: '1.5',
					fontWeight: '400',					
					color: '#777',
					'@screen lg': { fontSize: '22px', lineHeight: '1.6', // Large screens and above	
					}, 
				},
				'*:focus': {
					outline: 'none',
					boxshadow: 'none'
				},
				'*:focus-visible': {
				   outline: 'none',
				   boxshadow: 'none'
				},
				
				
			});
		  },
		  function ({ addComponents }) {
			addComponents({				
			  	  
			  '.submenu li a': {
				// Default styles for submenu links
				color: '#004850', // Text color for links inside the submenu
				fontSize: '0.86rem',
				padding: '0.3rem',
				display: 'block',
				textDecoration: 'none',
				'&:hover': {
				  color: '#00A2B2', // Hover color for submenu links
				  
				},
			  },
			  '.submenu li.current-menu-item > a': {
				// Default styles for submenu links
				color: '#A88E6B', // Text color for links inside the submenu				
			  },
			  '.footer-navigation li': {
				// Default styles for submenu links				
				padding: '0',
				marginTop:'15px',
				
			  },
			  '.footer-navigation li a': {
				// Default styles for submenu links				
				fontSize: '18px',
				fontWeight: '600',				
				textTransform: 'none',
				letterSpacing: '0',
				lineHeight: '1.4',
				'&:hover': {
				  color: '#00A2B2', // Hover color for submenu links
				  
				},
			  },
			  '.footer-navigation li.current-menu-item a': {
							
				color: '#00A2B2',
				
			  },
			  '.content-footer p': {
						
				fontSize: '18px',
				fontWeight: '600',	
				lineHeight: '1.4',
				
			  },
			  '.footer-r a': {
						
				color: '#FFFFFF',
				'&:hover': {
				  color: '#00A2B2', // Hover color 
				  
				},				
			  },
			  '.info-copyright a': {
						
				color: '#00A2B2',
				'&:hover': {
				  color: '#FFFFFF', // Hover color 
				  
				},				
			  },
			  '.locations p': {						
				
				lineHeight: '1.3',
				
			  },
			  '.locations a': {						
				lineHeight: '1.3',
				'&:hover': {
				  color: '#00A2B2', 
				  
				},
				
			  },
			
			});
		  },

		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson'),

		// Uncomment below to add additional first-party Tailwind plugins.
		require('@tailwindcss/forms'),
		require('@tailwindcss/aspect-ratio'),
		require('@tailwindcss/container-queries'),
	],
};
