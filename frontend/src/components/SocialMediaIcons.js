import React from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faGoogle, faGithub } from '@fortawesome/free-brands-svg-icons';

const SocialMediaIcons = () => (
  <div className="flex justify-center gap-5 mb-5 text-white">
    <FontAwesomeIcon icon={faGoogle} size="2x" className="cursor-pointer hover:text-google" aria-label="google" />
    <FontAwesomeIcon icon={faGithub} size="2x" className="cursor-pointer hover:text-github" aria-label="github" />
  </div>
);

export default SocialMediaIcons;
