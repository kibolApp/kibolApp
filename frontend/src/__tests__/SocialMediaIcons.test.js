import React from 'react';
import { render, screen } from '@testing-library/react';
import '@testing-library/jest-dom/extend-expect';
import SocialMediaIcons from '../components/SocialMediaIcons';

test('renders social media icons', () => {
  render(<SocialMediaIcons />);

  const facebookIcon = screen.getByLabelText(/facebook/i);
  const googleIcon = screen.getByLabelText(/google/i);
  const instagramIcon = screen.getByLabelText(/instagram/i);
  const twitterIcon = screen.getByLabelText(/twitter/i);
  const linkedinIcon = screen.getByLabelText(/linkedin/i);

  expect(facebookIcon).toBeInTheDocument();
  expect(googleIcon).toBeInTheDocument();
  expect(instagramIcon).toBeInTheDocument();
  expect(twitterIcon).toBeInTheDocument();
  expect(linkedinIcon).toBeInTheDocument();
});
