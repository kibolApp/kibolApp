import React from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faFacebook, faGoogle, faInstagram, faTwitter, faLinkedin } from '@fortawesome/free-brands-svg-icons';

const SocialMediaIcons = () => (
  <div className="flex justify-center gap-5 mb-5 text-white">
    <FontAwesomeIcon icon={faFacebook} size="2x" className="cursor-pointer hover:text-facebook" aria-label="facebook" />
    <FontAwesomeIcon icon={faGoogle} size="2x" className="cursor-pointer hover:text-google" aria-label="google" />
    <FontAwesomeIcon icon={faInstagram} size="2x" className="cursor-pointer hover:text-instagram" aria-label="instagram" />
    <FontAwesomeIcon icon={faTwitter} size="2x" className="cursor-pointer hover:text-twitter" aria-label="twitter" />
    <FontAwesomeIcon icon={faLinkedin} size="2x" className="cursor-pointer hover:text-linkedin" aria-label="linkedin" />
  </div>
);

export default SocialMediaIcons;
