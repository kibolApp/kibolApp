import React from 'react';
import { render, screen } from '@testing-library/react';
import '@testing-library/jest-dom/extend-expect';
import SocialMediaIcons from '../components/SocialMediaIcons';

test('renders social media icons', () => {
  render(<SocialMediaIcons />);

  const googleIcon = screen.getByLabelText(/google/i);
  const githubIcon = screen.getByLabelText(/github/i);

  expect(googleIcon).toBeInTheDocument();
  expect(githubIcon).toBeInTheDocument();
});
