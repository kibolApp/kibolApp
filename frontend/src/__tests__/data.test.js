import React from 'react';
import { render, screen } from '@testing-library/react';
import '@testing-library/jest-dom/extend-expect';  
import Magnifying from '../components/magnifying';  

test('renders FontAwesomeIcon', () => {
    render(<Magnifying />);

  const magnifyingGlassButton = screen.getByTestId('magnifying-glass-icon');

    expect(magnifyingGlassButton).toBeInTheDocument();
});
