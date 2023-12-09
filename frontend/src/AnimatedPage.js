import { motion } from "framer-motion";

const animations = {
    initial: { opacity: 1, scale: 1.05 }, 
    animate: { opacity: 1, scale: 1 },
    exit: { opacity: 1, scale: 1 }, 
  };
  
  const AnimatedPage = ({ children }) => {
    return (
      <motion.div
        variants={animations}
        initial="initial"
        animate="animate"
        exit="exit"
        transition={{ ease: "easeOut", duration: 1,  }}
      >
        {children}
      </motion.div>
    );
  };
  
  export default AnimatedPage;
  