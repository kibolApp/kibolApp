import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faMagnifyingGlass } from '@fortawesome/free-solid-svg-icons';

function magnifying() {
  return (
    <button data-testid="magnifying-glass-icon">
    <FontAwesomeIcon icon={faMagnifyingGlass} beat size="xl" className="mr-6 text-custom-brown" />
  </button>
  );
}

export default magnifying;