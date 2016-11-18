<?php
/**
 * Core_Language is a Wireframe core class.
 *
 * PHP version 5.6.0
 *
 * @package   Wireframe
 * @author    MixaTheme, Tada Burke
 * @version   1.0.0 Wireframe
 * @copyright 2012-2016 MixaTheme
 * @license   GPL-2.0+
 * @see       https://mixatheme.com
 * @see       https://github.com/mixatheme/Wireframe
 *
 * Wireframe is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Wireframe. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Namespaces.
 *
 * @since 5.3.0 PHP
 * @since 1.0.0 Wireframe
 */
namespace MixaTheme\WPWFT;
use WP_Error;

/**
 * No direct access to this file.
 *
 * @since 1.0.0 Wireframe
 */
defined( 'ABSPATH' ) or die();

/**
 * Check if the class exists.
 *
 * @since 1.0.0 Wireframe
 */
if ( ! class_exists( 'MixaTheme\WPWFT\Core_Language' ) ) :
	/**
	 * Core_Language is a core theme class for wiring i18n & l10n translation.
	 *
	 * @since 1.0.0 Wireframe
	 * @see   https://github.com/mixatheme/Wireframe
	 * @todo  There's zero reason for this to be a class.
	 */
	final class Core_Language extends Core_Module_Abstract implements Core_Language_Interface {
		/**
		 * Path.
		 *
		 * @access protected
		 * @since  1.0.0 Wireframe
		 * @var    array $path
		 */
		protected $path;

		/**
		 * Constructor runs when this class is instantiated.
		 *
		 * @since 1.0.0 Wireframe
		 * @param array $config Data via config file.
		 */
		public function __construct( $config ) {

			// Custom properties required for this class.
			$this->path = $config['path'];

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
		 * Load theme textdomain.
		 *
		 * @since  3.1.0 WordPress
		 * @since  1.0.0 Wireframe
		 */
		public function textdomain() {
			if ( isset( $this->prefix ) && isset( $this->path ) ) {
				$filterable = apply_filters(
					$this->prefix . '_' . __FUNCTION__,
					$this->path
				);
				load_theme_textdomain( $this->prefix, $filterable );
			}
		}

	} // Core_Language.

endif; // Thanks for using MixaTheme products!