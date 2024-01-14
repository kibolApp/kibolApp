import React from 'react';
import { render, screen } from '@testing-library/react';
import '@testing-library/jest-dom/extend-expect';
import WaitingPage from '../WaitingPage';

test('Renders WaitingPage component', () => {
  render(<WaitingPage />);

  const containerDiv = screen.getByTestId('screen');
  expect(containerDiv).toBeInTheDocument();

  const centerDiv = screen.getByTestId('center');
  expect(centerDiv).toBeInTheDocument();

  const pleaseWaitTextElement = screen.getByText(/Please Wait/i);
  expect(pleaseWaitTextElement).toBeInTheDocument();
  expect(pleaseWaitTextElement).toHaveClass('bg-custom-sand p-16 rounded-2xl shadow-2xl max-w-md w-full m-4');
});
