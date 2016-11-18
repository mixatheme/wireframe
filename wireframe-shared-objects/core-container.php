<?php
/**
 * Core_Container is a Wireframe core class.
 *
 * PHP version 5.6.0
 *
 * @package   Wirefrme
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
if ( ! class_exists( 'MixaTheme\WPWFT\Core_Container' ) ) :
	/**
	 * Core_Container is a core theme class for storing objects.
	 *
	 * @since 1.0.0 Wireframe
	 * @see   https://github.com/mixatheme/Wireframe
	 * @see   http://fabien.potencier.org/do-you-need-a-dependency-injection-container.html
	 *
	 * @internal Thanks: Fabien Potencier
	 */
	final class Core_Container implements Core_Container_Interface {
		/**
		 * Storage array.
		 *
		 * @access private
		 * @since  1.0.0 Wireframe
		 * @var    array $storage Array of objects.
		 */
		private $storage = array();

		/**
		 * Register service with the Storage array.
		 *
		 * @since 1.0.0 Wireframe
		 * @param string   $service  Service key.
		 * @param callable $resolver Service instance value.
		 */
		public function __set( $service, $resolver ) {
			$this->storage[ $service ] = $resolver;
		}

		/**
		 * Get service from the Storage array.
		 *
		 * @since  1.0.0 Wireframe
		 * @param  string $service Service key.
		 * @return callable Closure as an object instance.
		 */
		public function __get( $service ) {
			return $this->storage[ $service ]();
		}

	} // Core_Container.

endif; // Thanks for using MixaTheme products!