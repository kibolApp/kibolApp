import React from 'react';
import { render, screen } from '@testing-library/react';
import '@testing-library/jest-dom/extend-expect';
import LoadingScreen from '../LoadingScreen';

test('Renders LoadingScreen component', () => {
  render(<LoadingScreen />);
  const loadingTextElement = screen.getByText('Loading...');
  const kibolAppTextElement = screen.getByText('KibolAPP');

  expect(loadingTextElement).toBeInTheDocument();
  expect(loadingTextElement).toHaveClass('text-white mt-8 text-3xl fill-current');

  expect(kibolAppTextElement).toBeInTheDocument();
  expect(kibolAppTextElement).toHaveClass('text-custom-brown mb-8 text-3xl fill-current');


});
