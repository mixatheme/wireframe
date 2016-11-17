<?php
/**
 * Theme_Notices is a Wireframe theme class packaged with WP Wireframe Theme.
 *
 * PHP version 5.6.0
 *
 * @package   WP Wireframe Theme
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 WP Wireframe Theme
 * @copyright 2012-2016 MixaTheme
 * @license   GPL-2.0+
 * @see       https://mixatheme.com
 * @see       https://github.com/mixatheme/Wireframe
 * @see       https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices
 *
 * WP Wireframe Theme is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WP Wireframe Theme. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Namespaces.
 *
 * @since 5.3.0 PHP
 * @since 1.0.0 WP Wireframe Theme
 */
namespace MixaTheme\WPWFT;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 WP Wireframe Theme
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 WP Wireframe Theme
 */
if ( ! class_exists( 'MixaTheme\WPWFT\Theme_Notices' ) ) :
	/**
	 * Theme_Notices is a theme class for wiring notifications.
	 *
	 * @since 1.0.0 Wireframe
	 * @since 1.0.0 WP Wireframe Theme
	 * @see   https://github.com/mixatheme/Wireframe
	 */
	final class Theme_Notices extends Core_Module_Abstract implements Theme_Notices_Interface {
		/**
		 * Notices.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe
		 * @since  1.0.0 WP Wireframe Theme
		 * @var    array $notices
		 */
		protected $notices;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 WP Wireframe Theme
		 * @param array $config Config data.
		 */
		public function __construct( $config ) {

			// Custom properties required for this class.
			$this->notices = $config['notices'];

			// Default properties via Circuit abstract class.
			$this->wired    = $config['wired'];
			$this->prefix   = $config['prefix'];
			$this->_actions = $config['actions'];
			$this->_filters = $config['filters'];

			/**
			 * Most objects are not required to be hooked when instantiated.
			 * In your object config file(s), you can set the `$hooked` value
			 * to true or false. If false, you can decouple any hooks and declare
			 * them elsewhere. If true, then objects fire hooks onload.
			 *
			 * Config data files are located in: `wpwft_dev/wireframe/config/`
			 */
			if ( isset( $this->wired ) ) {
				$this->wire_actions( $this->_actions );
				$this->wire_filters( $this->_filters );
			}
		}

		/**
		 * Parent Theme.
		 *
		 * This notice is triggered when the WPWFT parent theme is activated.
		 * You can greet customers, instruct customizers to use child themes,
		 * recommended plugins to install, etc.
		 *
		 * @since 1.0.0 Wireframe
		 * @since 1.0.0 WP Wireframe Theme
		 */
		public function parent_theme() {

			// Default empty notice.
			$notice  = '';

			// Check if not a child theme and if config has notices.
			if ( false === is_child_theme() && isset( $this->notices ) ) {

				// Get notice from the array of notices.
				$value = $this->notices['parent_theme'];

				// Build notice.
				$notice .= '<div class="' . $value['selectors'] . '"><p>';
				$notice .= $value['subject'] . '&nbsp;' . $value['message'];
				$notice .= '</p></div>';

				// Output notice should use the `after_setup_theme` hook.
				echo wp_kses_post( $notice );
			}
		}

	} // Theme_Notices.

endif; // Thanks for using MixaTheme products!
